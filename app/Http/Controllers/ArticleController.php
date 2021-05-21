<?php

namespace App\Http\Controllers;

use App\Alt;
use App\AltNews;
use App\Article;
use App\ArticleCategory;
use App\ArticleGallery;
use App\ArticleTranslate;
use App\Esas;
use App\Events\PostHasViewed;
use App\Http\Requests;
use App\Http\Requests\NewsRequest;
use App\News;
use Auth;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Str;
use Image;
use Jenssegers\Date\Date;
use Redirect;
use Response;
use Session;
use Validator;

class ArticleController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {

    }

    public function create()
    {
    }

    public function store(Request $request)
    {
    }

    public function edit($type)
    {

        
        if ($type == 'about') {
            $galleries = ArticleGallery::where('article_id', 3)->get();
            $article = Article::where('type', 'about')->first();
            return view('admin.about_edit', compact('article', 'galleries'));
        } elseif ($type == 'catdirilma') {
            $article = Article::where('type', 'catdirilma')->first();
            return view('admin.catdirilma_edit', compact('article'));
        } elseif ($type == 'zemanet') {
            $article = Article::where('type', 'zemanet')->first();
            return view('admin.qaytarilma_edit', compact('article'));
        }
    }

    public function update(Request $request, $id)
    {
        if ($request->type == 'about') {
            if (!empty($request['old_img_gallery_id']) and $request['img_gallery_id']) {
                $diff = array_diff($request['old_img_gallery_id'], $request['img_gallery_id']);
                foreach ($diff as $dif) {
                    $imgname = ArticleGallery::where('id', $dif)->first()->name;
                    unlink('./public/article/' . $imgname);
                    \Illuminate\Support\Facades\DB::table('article_gallery')
                        ->where('id', $dif)
                        ->delete();
                }

            } else if (empty($request['img_gallery_id']) and !empty($request['old_img_gallery_id'])) {

                foreach ($request['old_img_gallery_id'] as $dif) {
                    $imgname = ArticleGallery::where('id', $dif)->first()->name;
                    unlink('./public/article/' . $imgname);
                    DB::table('article_gallery')
                        ->where('id', $dif)
                        ->delete();
                }
            }
            if ($request->img_gallery) {
                for ($i = 0; $i < count($request->img_gallery); $i++) {
                    if ($request['img_gallery'][$i]) {
                        $file = $request->img_gallery[$i];
                        $file_gallery_img = $file->getClientOriginalName();
                        $file_size = round($file->getSize() / 1024);
                        $file_ex = $file->getClientOriginalExtension();
                        $file_mime = $file->getMimeType();
                        $newname = $file_gallery_img;
                        $file_gallery_img = time() . $file->getClientOriginalName();
                        $file->move('public/article', $file_gallery_img);
                        ArticleGallery::create([
                            'article_id' => $id,
                            'type' => 'img',
                            'name' => $file_gallery_img
                        ]);
                    }
                }
            }

            if (!empty($request['old_video_gallery']) and $request['current_video_gallery']) {
                $diff = array_diff($request['old_video_gallery'], $request['current_video_gallery']);
                foreach ($diff as $dif) {
                    $video_thumbnail = ArticleGallery::where('id', $dif)->first()->video_img;
                    unlink('./public/ArticleVideoThumbnail/' . $video_thumbnail);
                    DB::table('article_gallery')
                        ->where('id', $dif)
                        ->delete();
                }

            } else if (empty($request['current_video_gallery']) and !empty($request['old_video_gallery'])) {

                foreach ($request['old_video_gallery'] as $dif) {
                    $video_thumbnail = ArticleGallery::where('id', $dif)->first()->video_img;
                    unlink('./public/ArticleVideoThumbnail/' . $video_thumbnail);
                    DB::table('article_gallery')
                        ->where('id', $dif)
                        ->delete();
                }
            }

            if ($request['new_video_gallery']) {
                for ($v = 0; $v < count($request['new_video_gallery']); $v++) {

                    if ($request['new_video_thumbnail']) {
                        $file = $request['new_video_thumbnail'][$v];
                        $video_thumb_name = $file->getClientOriginalName();
                        $file_size = round($file->getSize() / 1024);
                        $file_ex = $file->getClientOriginalExtension();
                        $file_mime = $file->getMimeType();
                        $video_thumb_name = time() . $file->getClientOriginalName();
                        $file->move('public/ArticleVideoThumbnail/', $video_thumb_name);
                    } else {
                        $video_thumb_name = "";
                    }
                    ArticleGallery::create([
                        'article_id' => $id,
                        'type' => 'video',
                        'name' => $request['new_video_gallery'][$v],
                        'video_img' => $video_thumb_name,
                    ]);
                }
            }
            if ($request['current_video_gallery']) {
                for ($i = 0; $i < count($request['current_video_gallery']); $i++) {
                    ArticleGallery::where('id', $request['current_video_gallery'][$i])->update([
                        'name' => $request['current'][$i],
                    ]);
                }
            }

            if ($request['main_img']) {
                $file = $request['main_img'];
                $file_name = $file->getClientOriginalName();
                $file_size = round($file->getSize() / 1024);
                $file_ex = $file->getClientOriginalExtension();
                $file_mime = $file->getMimeType();
                $file_name = time() . $file->getClientOriginalName();
                $file->move('public/article', $file_name);
            } else {
                $file_name = $request['main_old'];
            };
            if ($request['main_img2']) {
                $file = $request['main_img2'];
                $file_name2 = $file->getClientOriginalName();
                $file_size = round($file->getSize() / 1024);
                $file_ex = $file->getClientOriginalExtension();
                $file_mime = $file->getMimeType();
                $file_name2 = time() . $file->getClientOriginalName();
                $file->move('public/article', $file_name2);
            } else {
                $file_name2 = $request['main_old2'];
            };

            Article::where('type', 'about')->update([
                'img' => $file_name,
                'img2' => $file_name2,
            ]);

            for ($i = 0; $i < count($request->lang); $i++) {
                ArticleTranslate::where(['article_id' => $id, 'lang' => $request['lang'][$i]])->update([
                    'title' => $request['title'][$i],
                    'text' => $request['text'][$i],
                    'text2' => $request['text2'][$i],
                    'lang' => $request['lang'][$i],
                    'slug' => Str::slug($request['title'][$i])
                ]);
            }

            return \Redirect::back()
                ->with('message', 'Mətniniz uğurla dəyişdirildi');

        } elseif ($request->type == 'catdirilma') {
            if ($request['img']) {
                $file = $request['img'];
                $file_name = $file->getClientOriginalName();
                $file_size = round($file->getSize() / 1024);
                $file_ex = $file->getClientOriginalExtension();
                $file_mime = $file->getMimeType();
                $file_name = time() . $file->getClientOriginalName();
                $file->move('public/article', $file_name);
            } else {
                $file_name = $request['old_img'];
            };

            Article::where('type', 'catdirilma')->update([
                'img' => $file_name,
            ]);

            for ($i = 0; $i < count($request->lang); $i++) {
                ArticleTranslate::where(['article_id' => $id, 'lang' => $request['lang'][$i]])->update([
                    'title' => $request['title'][$i],
                    'text' => $request['text'][$i],
                    'lang' => $request['lang'][$i],
                    'slug' => Str::slug($request['title'][$i])
                ]);
            }

            return \Redirect::back()
                ->with('message', 'Mətniniz uğurla dəyişdirildi');


        } elseif ($request->type == 'zemanet') {
            if ($request['img']) {
                $file = $request['img'];
                $file_name = $file->getClientOriginalName();
                $file_size = round($file->getSize() / 1024);
                $file_ex = $file->getClientOriginalExtension();
                $file_mime = $file->getMimeType();
                $file_name = time() . $file->getClientOriginalName();
                $file->move('public/article', $file_name);
            } else {
                $file_name = $request['old_img'];
            };

            Article::where('type', 'zemanet')->update([
                'img' => $file_name,
            ]);

            for ($i = 0; $i < count($request->lang); $i++) {
                ArticleTranslate::where(['article_id' => $id, 'lang' => $request['lang'][$i]])->update([
                    'title' => $request['title'][$i],
                    'text' => $request['text'][$i],
                    'lang' => $request['lang'][$i],
                    'slug' => Str::slug($request['title'][$i])
                ]);
            }

            return \Redirect::back()
                ->with('message', 'Mətniniz uğurla dəyişdirildi');

        }
    }

    public function destroy($id)
    {
    }

}
