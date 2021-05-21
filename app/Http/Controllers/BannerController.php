<?php

namespace App\Http\Controllers;

use App\Banner;
use App\BannerTranslate;
use App\DiscountCard;
use App\DiscountCardTranslate;
use App\Esas;
use App\Http\Requests;
use App\Http\Requests\CatRequest;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Image;
use Str;
use Session;


class BannerController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $banners = Banner::where('destroy', 0)->get();
        return view('admin.banner_list', compact('banners'));
    }

    public function create()
    {
        return view('admin.banner_add');
    }

    public function store(Request $request)
    {
        if ($request['img']) {
            $file = $request->img;
            $file_name = $file->getClientOriginalName();
            $file_size = round($file->getSize() / 1024);
            $file_ex = $file->getClientOriginalExtension();
            $file_mime = $file->getMimeType();
            $file_name = time() . $file->getClientOriginalName();
            $file->move('public/Banner', $file_name);
        } else {
            $file_name = '';
        }

        $banner = Banner::create(['img'=>$file_name])->id;

        for($i=0;$i<count($request->lang);$i++){
            BannerTranslate::create([
                'banner_id' => $banner,
                'title' => $request['basliq'][$i],
                'text' => $request['text'][$i],
                'lang' => $request['lang'][$i],
                'slug' => Str::slug($request['basliq'][$i]),
            ]);
        }


        Session::flash('mesaj', 'Banner Əlavə olundu.');
        return \Redirect::to('/banner_list');
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        $banners = Banner::where('id', $id)->first();
        return view('admin.banner_edit', compact('banners'));
    }


    public function update(Request $request, $id)
    {

        
        if ($request['img']) {
            $file = $request->img;
            $file_name = $file->getClientOriginalName();
            $file_size = round($file->getSize() / 1024);
            $file_ex = $file->getClientOriginalExtension();
            $file_mime = $file->getMimeType();
            $file_name = time() . $file->getClientOriginalName();
            $file->move('public/Banner', $file_name);
        } else {
            $file_name = $request['old_img'];
        }

        


        $updateBanner = Banner::find($id);
        $updateBanner->img = $file_name;
       
        $updateBanner->save();
        
        for ($k = 0; $k < count($request->lang); $k++) {
            BannerTranslate::where('banner_id', $id)->where('lang', $request['lang'][$k])->update([
                'title' => $request['basliq'][$k],
                'text' => $request['text'][$k],
                'slug' => Str::slug($request['basliq'][$k]),
                
            ]);
        }


        return \Redirect::back()
            ->with('message', 'Banner uğurla dəyişdirildi');
    }

    public function destroy($id)
    {
          Banner::where('id',$id)->update(['destroy'=>1]);
          return redirect('/banner_list');
    }

    public function discountEdit($id)
    {
        $discountCard = DiscountCard::where('id', 1)->first();
        return view('admin.discount_card_edit', compact('discountCard'));
    }

    public function discountUpdate(Request $request, $id)
    {
        if ($request['img']) {
            $file = $request['img'];
            $file_name = $file->getClientOriginalName();
            $file_size = round($file->getSize() / 1024);
            $file_ex = $file->getClientOriginalExtension();
            $file_mime = $file->getMimeType();
            $file_name = time() . $file->getClientOriginalName();
            $file->move('public/Banner', $file_name);
        } else {
            $file_name = $request['old_img'];
        };

        DiscountCard::where('id', $id)->update([
            'img' => $file_name,
        ]);

        for ($i = 0; $i < count($request->lang); $i++) {
            DiscountCardTranslate::where(['card_id' => $id, 'lang' => $request['lang'][$i]])->update([
                'title' => $request['basliq'][$i],
                'text' => $request['ardi'][$i],
                'lang' => $request['lang'][$i],
                'order_link' => $request['order_link'][$i],
                'more_link' => $request['more_link'][$i],
            ]);
        }

        return \Redirect::route('discountCardEdit', ['id' => $id])
            ->with('message', 'Endirim kartı uğurla dəyişdirildi');
    }

    public function activeCard(Request $request)
    {
        $status = DiscountCard::where('id', 1)->first()->switch;
        if ($status == 0) {
            $status = 1;
        } else {
            $status = 0;
        }
        DiscountCard::where('id', 1)->update([
            'switch' => $status
        ]);
    }
}
