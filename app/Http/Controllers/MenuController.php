<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\CatRequest;
use App\Menu;
use App\MenuTranslate;
use Auth;
use DB;
use Illuminate\Http\Request;
use Image;
use Session;
use Str;


class MenuController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $menular = Menu::get();
        return view('admin.menu_list', compact('menular'));
    }

    public function create()
    {
        $cat = Menu::all();
        return view('admin.menu_add', compact('cat'));
    }


    public function store(Request $request)
    {
        $menu_id = Menu::create([
            'parent' => $request['menu_type'],
        ])->id;

        for ($i = 0; $i < count($request->lang); $i++) {
            MenuTranslate::create([
                'menu_id' => $menu_id,
                'name' => $request['ad'][$i],
                'slug' => Str::slug($request['ad'][$i]),
                'lang' => $request['lang'][$i]
            ]);
        }
        Session::flash('mesaj', 'Menu Əlavə olundu.');
        return \Redirect::to('/menu');
    }

    public function edit($id)
    {
        $menues = Menu::get();
        $menu = Menu::where('id', $id)->first();
        return view('admin.menu_edit', compact('menues', 'menu'));
    }


    public function update(Request $request, $id)
    {
        Menu::where('id', $id)->update([
            'parent' => $request['menu_type'],
        ]);

        for ($i = 0; $i < count($request->lang); $i++) {
            MenuTranslate::where(['menu_id' => $id, 'lang' => $request['lang'][$i]])->update([
                'name' => $request['ad'][$i],
                'lang' => $request['lang'][$i],
                'slug' => Str::slug($request['ad'][$i])
            ]);
        }
        Session::flash('mesaj', 'Menu Dəyişdirildi ');
        return \Redirect::to('/menu');
    }

    public function destroy($id)
    {
        Menu::findOrFail($id)->delete();
        return redirect('/menu');
    }
}
