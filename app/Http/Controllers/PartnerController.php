<?php

namespace App\Http\Controllers;

use App\Partner;
use Illuminate\Http\Request;

class PartnerController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $partners = Partner::all();
        return view('admin.partner_list',compact('partners'));
    }

    public function create()
    {
        return view('admin.partner_add');
    }

    public function store(Request $request)
    {
        if ($request['img']) {
            $file = $request['img'];
            $file_name = $file->getClientOriginalName();
            $file_size = round($file->getSize() / 1024);
            $file_ex = $file->getClientOriginalExtension();
            $file_mime = $file->getMimeType();
            $file_name = time().$file->getClientOriginalName();
            $file->move('public/partners', $file_name);
        } else {
            $file_name = "";
        }

        Partner::create([
            'slider'=>$file_name,
            'title'=>$request['title'],
            'link'=>$request['link'],
        ]);
        return \Redirect::to('/partner_list')->with('message', 'Partnyorunuz uğurla əlavə edildi');

    }
    public function edit($id)
    {
        $partner = Partner::findOrFail($id);
        return view('admin.partner_edit',compact('partner'));
    }

    public function update(Request $request, $id)
    {
        if ($request['img']) {
            $file = $request['img'];
            $file_name = $file->getClientOriginalName();
            $file_size = round($file->getSize() / 1024);
            $file_ex = $file->getClientOriginalExtension();
            $file_mime = $file->getMimeType();
            $file_name = time().$file->getClientOriginalName();
            $file->move('public/partners', $file_name);
        } else {
            $file_name = $request['old_img'];
        }
        Partner::where(['id'=>$id])->update([
            'slider' => $file_name,
            'title' => $request['title'],
            'link' => $request['link']
        ]);

        return \Redirect::to('/partner_list')
            ->with('message', 'Partnyorunuz uğurla dəyişdirildi');
    }

    public function destroy($id)
    {
        Partner::findOrFail($id)->delete();
        return \Redirect::to('/partner_list')
            ->with('message', 'Partnyorunuz uğurla silindi');
    }
}
