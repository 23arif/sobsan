<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Yanson;

class YansonController extends Controller
{
public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $word = Yanson::all();
        return view('admin.animationwordsadd',compact('word'));
    }

    public function create()
    {
        return view('admin.yansonadd');
    }

    public function store(Request $request)
    {
        // Yanson::create([
        //
        //     'nomre' => $request['yanson'],
        //     'email' => $request['yazi'],
        //     'email' => $request['yazi'],
        //
        // ]);
        // return redirect('animationwordsadd');

    }


    public function show($id)
    {
    }


    public function edit($id)
    {
        $woredit = Yanson::find($id);
        return view('admin.yansonedit', compact('woredit'));
    }


    public function update(Request $request, $id)
    {
        $data = $request->input();
        $yanson = Yanson::find($id);
        $yanson->nomre = $data['nomre'];
        $yanson->email = $data['email'];
        $yanson->fax = $data['fax'];
        $yanson->adress = $data['adress'];
        $yanson->facebook = $data['facebook'];
        $yanson->instagram = $data['instagram'];
        $yanson->youtube = $data['youtube'];
        $yanson->save();
        return redirect('/animationwordsadd');
    }


    public function destroy($id)
    {
        Yanson::find($id)->delete();
        return redirect('animationwordsadd');
    }
}
