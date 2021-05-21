<?php

namespace App\Http\Controllers;

use App\Colors;
use Illuminate\Http\Request;

class ColorsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $colors = Colors::all();
        return view('admin.color_list',compact('colors'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.color_add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $saveColor =Colors::create([
            'color_n_az'=>$request['ad_az'],
            'color_n_en'=>$request['ad_en'],
            'color_n_ru'=>$request['ad_ru'],
            'code'=>$request['color_code'],
        ]);
        if($saveColor){
            return \Redirect::to('/color')
                ->with('message', 'Rəng əlavə olundu');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $color = Colors::where('id',$id)->first();
        return view('admin.color_edit',compact('color'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $saveColor =Colors::where('id',$id)->update([
            'color_n_az'=>$request['ad_az'],
            'color_n_en'=>$request['ad_en'],
            'color_n_ru'=>$request['ad_ru'],
            'code'=>$request['color_code'],
        ]);
        if($saveColor){
            return \Redirect::to('/color')
                ->with('message', 'Rəng əlavə olundu');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Colors::where('id',$id)->delete();
        return redirect()->back();
    }
}
