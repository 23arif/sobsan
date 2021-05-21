<?php

namespace App\Http\Controllers;

use App\Category;
use App\CategoryTranslate;
use App\Http\Requests;
use App\Http\Requests\CatRequest;
use Auth;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Image;
use Session;


class CatController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $cat = Category::with('parent', 'children')->where('parent', 0)->get();
        return view('admin.bolme', compact('cat'));
    }

    public function create()
    {
        $cat = Category::all();
        return view('admin.bolmeadd', compact('cat'));
    }


    public function store(Request $request)
    {
        if ($request->parent != 0) {
            $parent = DB::table('category_translate')->where('cat_id', $request->parent)->get();
            $slug[0] = $parent->where('lang', 'az')->first()->slug . '-' . Str::slug($request->ad[0]);
            $slug[1] = $parent->where('lang', 'en')->first()->slug . '-' . Str::slug($request->ad[1]);
            $slug[2] = $parent->where('lang', 'ru')->first()->slug . '-' . Str::slug($request->ad[2]);
        } else {
            $slug[0] = Str::slug($request->ad[0]);
            $slug[1] = Str::slug($request->ad[1]);
            $slug[2] = Str::slug($request->ad[2]);
        }
//        if ($request['home'] == 'on') {
//            $request['home'] = 1;
//        } else {
//            $request['home'] = 0;
//        }
//        if ($request['catImg']) {
//            $file = $request['catImg'];
//            $file_name = $file->getClientOriginalName();
//            $file_size = round($file->getSize() / 1024);
//            $file_ex = $file->getClientOriginalExtension();
//            $file_mime = $file->getMimeType();
//            $file_name = time() . $file->getClientOriginalName();
//            $file->move('public/CatImgs', $file_name);
//        } else {
//            $file_name = '';
//        };

        if($request['discount'] == 0 || $request['discount'] == null){
            $discount = 0.00;
        }else{
            $discount = $request['discount'];
        }

        $cat_id = Category::create([
            'parent' => $request['parent'],
            'home' => $request['home'],
            'discount' => $discount,
        ])->id;

        for ($i = 0; $i < count($request->lang); $i++) {
            CategoryTranslate::create([
                'cat_id' => $cat_id,
                'name' => $request['ad'][$i],
                'slug' => $slug[$i],
                'lang' => $request['lang'][$i]
            ]);
        }
        Session::flash('mesaj', 'Kateqoriya Əlavə olundu.');
        return \Redirect::to('/bolme');
    }

    public function show($id)
    {
    }

    public function edit($id)
    {
        $allCat = Category::where('parent', 0)->get();
        $cat = Category::where('id', $id)->first();
        return view('admin.bolmeedit', compact('cat', 'allCat'));
    }


    public function update(Request $request, $id)
    {
        if($request->parent != 0){
            $parent = DB::table('category_translate')->where('cat_id',$id)->get();
            $slug[0] = $parent->where('lang','az')->first()->slug.'-'.Str::slug($request->ad[0]);
            $slug[1] = $parent->where('lang','en')->first()->slug.'-'.Str::slug($request->ad[1]);
            $slug[2] = $parent->where('lang','ru')->first()->slug.'-'.Str::slug($request->ad[2]);
        }else{
            $slug[0] = Str::slug($request->ad[0]);
            $slug[1] = Str::slug($request->ad[1]);
            $slug[2] = Str::slug($request->ad[2]);
        }
////if ($request['home'] == 'on') {
////            $request['home'] = 1;
////        } else {
////            $request['home'] = 0;
////        }
//        if ($request['catImg']) {
//            $file = $request['catImg'];
//            $file_name = $file->getClientOriginalName();
//            $file_size = round($file->getSize() / 1024);
//            $file_ex = $file->getClientOriginalExtension();
//            $file_mime = $file->getMimeType();
//            $file_name = time() . $file->getClientOriginalName();
//            $file->move('public/CatImgs', $file_name);
//        } else {
//            $file_name = $request->old_img;
//        };
        if($request['discount'] == 0 || $request['discount'] == null){
            $discount = 0.00;
        }else{
            $discount = $request['discount'];
        }

        Category::where('id', $id)->update([
            'parent' => $request['parent'],
            'home' => $request['home'],
            'discount' => $discount,
        ]);

        for ($i = 0; $i < count($request->lang); $i++) {
            CategoryTranslate::where(['cat_id' => $id, 'lang' => $request['lang'][$i]])->update([
                'name' => $request['ad'][$i],
                'lang' => $request['lang'][$i],
                'slug' => $slug[$i]
            ]);
        }
        Session::flash('mesaj', 'Kateqoriya Dəyişdirildi ');
        return \Redirect::to('bolme');
    }

    public function destroy($id)
    {
        Category::findOrFail($id)->delete();
        return \Redirect::to('/bolme');
    }
}
