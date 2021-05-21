<?php

namespace App\Http\Controllers;

use App\Gallery;
use Illuminate\Http\Request;

class VideoGalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $videos = Gallery::where('type','video')->get();
        return view('admin.video_list',compact('videos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.video_add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if ($request['thumbnail']) {
            $file = $request->thumbnail;
            $thumbnail = $file->getClientOriginalName();
            $file_size = round($file->getSize() / 1024);
            $file_ex = $file->getClientOriginalExtension();
            $file_mime = $file->getMimeType();
            $newname = $thumbnail;
            $thumbnail = time() . $file->getClientOriginalName();
            $file->move('public/Gallery', $thumbnail);
        } else {
            $thumbnail = '';
        }

        if ($request['important'] == 'on') {
            $request['important'] = 1;
        } else {
            $request['important'] = 0;
        }
        Gallery::create([
            'path'=>$request['path'],
            'thumbnail'=>$thumbnail,
            'type'=>'video',
            'title_az'=>$request['title_az'],
            'title_en'=>$request['title_en'],
            'title_ru'=>$request['title_ru'],
            'important'=>$request['important'],
            
        ]);
        return \Redirect::to('/video_list')->with('message', ' Video əlavə edildi');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $video = Gallery::where('id',$id)->first();
        return view('admin.video_edit',compact('video'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if ($request['thumbnail']) {
            $file = $request->thumbnail;
            $thumbnail = $file->getClientOriginalName();
            $file_size = round($file->getSize() / 1024);
            $file_ex = $file->getClientOriginalExtension();
            $file_mime = $file->getMimeType();
            $newname = $thumbnail;
            $thumbnail = time() . $file->getClientOriginalName();
            $file->move('public/Gallery', $thumbnail);
        } else {
            $thumbnail = $request['old_thumbnail'];
        }
        if ($request['important'] == 'on') {
            $request['important'] = 1;
        } else {
            $request['important'] = 0;
        }
        Gallery::where('id',$id)->update([
            'path'=>$request['path'],
            'thumbnail'=>$thumbnail,
            'title_az'=>$request['title_az'],
            'title_en'=>$request['title_en'],
            'title_ru'=>$request['title_ru'],
            'important'=>$request['important'],
        ]);
        return \Redirect::to('/video_list')->with('message', ' Video yeniləndi.');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $imgname = Gallery::where('id', $id)->first()->thumbnail;
        unlink('./public/Gallery/' . $imgname);
        Gallery::findOrFail($id)->delete();
        return \Redirect::to('/video_list')->with('message', ' Video silindi');
    }
}
