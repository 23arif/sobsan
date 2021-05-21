<?php

namespace App\Http\Controllers;

use App\Slider;
use App\SliderTranslate;
use Illuminate\Http\Request;

class SliderController extends Controller
{
    public function index()
    {
        $sliders = Slider::all();
        
        return view('admin.slider_list', compact('sliders'));
    }

    public function create()
    {
        return view('admin.slider_add');
    }

    public function store(Request $request)
    {
        if ($request['img']) {
            $file = $request['img'];
            $file_name = $file->getClientOriginalName();
            $file_size = round($file->getSize() / 1024);
            $file_ex = $file->getClientOriginalExtension();
            $file_mime = $file->getMimeType();
            $file_name = time() . $file->getClientOriginalName();
            $file->move('public/slider', $file_name);
        } else {
            $file_name = "";
        }

        $slider = Slider::create([
            'img' => $file_name,
            'link' => $request['link']
        ])->id;

        for ($i = 0; $i < count($request->lang); $i++) {
            if ($i != 0) {
                SliderTranslate::create([
                    'slider_id' => $slider,
                    'title' => $request['basliq'][0],
                    'text' => $request['xeber_ardi'][0],
                    'button' => $request['button'][0],
                    'link' => $request['link'][0],
                    'lang' => $request['lang'][$i],
                ]);
            } else {
                SliderTranslate::create([
                    'slider_id' => $slider,
                    'title' => $request['basliq'][$i],
                    'text' => $request['xeber_ardi'][$i],
                    'button' => $request['button'][0],
                    'link' => $request['link'][0],
                    'lang' => $request['lang'][$i],
                ]);
            }
        }

        return \Redirect::to('/slider_list')->with('message', 'Slideriniz uğurla əlavə edildi');

    }


    public function edit($id)
    {
        $slider = Slider::findOrFail($id);
        return view('admin.slider_edit', compact('slider'));
    }

    public function update(Request $request, $id)
    {
        if ($request['img']) {
            $file = $request['img'];
            $file_name = $file->getClientOriginalName();
            $file_size = round($file->getSize() / 1024);
            $file_ex = $file->getClientOriginalExtension();
            $file_mime = $file->getMimeType();
            $file_name = time() . $file->getClientOriginalName();
            $file->move('public/slider', $file_name);
        } else {
            $file_name = $request['old_img'];
        }
        Slider::where(['id' => $id])->update([
            'img' => $file_name,
            'link' => $request['link']
        ]);

        for ($i = 0; $i < count($request->lang); $i++) {
                SliderTranslate::where(['slider_id'=>$id,'lang'=>$request['lang'][$i]])->update([
                    'slider_id' => $id,
                    'title' => $request['basliq'][$i],
                    'text' => $request['article_ardi'][$i],
                    'button' => $request['button'][$i],
                    'link' => $request['link'][$i],
                    'lang' => $request['lang'][$i],
                ]);
        }

        return \Redirect::to('/slider_list')
            ->with('message', 'Slideriniz uğurla dəyişdirildi');
    }

    public function destroy($id)
    {
        Slider::findOrFail($id)->delete();
        return \Redirect::to('/slider_list')
            ->with('message', 'Slideriniz uğurla silindi');
    }
}
