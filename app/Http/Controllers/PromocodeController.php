<?php

namespace App\Http\Controllers;

use App\Category;
use App\Promocode;
use Illuminate\Http\Request;

class PromocodeController extends Controller
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
        $promos = Promocode::orderByDesc('id')->paginate(15);
        return view('admin.promo_list',compact('promos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('admin.promo_add',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Promocode::create([
            'cat'=>$request['cat'],
            'start'=>$request['start'],
            'end'=>$request['end'],
            'amount'=>$request['amount'],
            'type'=>$request['type'],
        ]);

        return \Redirect::to('/promo_list')
            ->with('message', 'Promocode əlavə olundu.');
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
        $categories = Category::all();
        $promo = Promocode::where('id',$id)->first();
        return view('admin.promo_edit',compact('promo','categories'));
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
        Promocode::where('id',$id)->update([
            'cat'=>$request['cat'],
            'start'=>$request['start'],
            'end'=>$request['end'],
            'amount'=>$request['amount'],
            'type'=>$request['type']
        ]);
        return \Redirect::to('/promo_list')
            ->with('message', 'Promocode yeniləndi.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Promocode::findOrFail($id)->delete();
        return \Redirect::to('/promo_list')
            ->with('message', 'Promocode silindi.');
    }
}
