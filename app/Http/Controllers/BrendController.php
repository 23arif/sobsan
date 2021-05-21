<?php

namespace App\Http\Controllers;

use App\Brend;
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


class BrendController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $brends = Brend::all();
        return view('admin.brend_list', compact('brends'));
    }

    public function create()
    {
        return view('admin.brend_add');
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
            $file->move('public/brand', $file_name);
        } else {
            $file_name = '';
        }

        $banner = Brend::create([
            'img'=>$file_name,
            'name'=>$request['name']
        ]
        )->id;

        


        Session::flash('mesaj', 'Brend Əlavə olundu.');
        return \Redirect::to('/brend_list');
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        $brend = Brend::where('id', $id)->first();
        return view('admin.brend_edit', compact('brend'));
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
            $file->move('public/brend', $file_name);
        } else {
            $file_name = $request['old_img'];
        }

        


        $updateBrend = Brend::find($id);
        $updateBrend->img = $file_name;
        $updateBrend->name = $request->name;
       
        $updateBrend->save();
        
        


        return \Redirect::back()
            ->with('message', 'Brend uğurla dəyişdirildi');
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
