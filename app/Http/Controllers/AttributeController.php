<?php

namespace App\Http\Controllers;

use App\Attribute;
use App\AttributeGroup;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Session;

class AttributeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $attrGroups = AttributeGroup::where('destroy', 0)->get();
        $attributes = Attribute::where('destroy', 0)->get();
        return view('admin.attribute_list', compact('attributes', 'attrGroups'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $groups = AttributeGroup::where('destroy', 0)->get();
        return view('admin.attribute_add', compact('groups'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        for ($i = 0; $i < count($request['ad_az']); $i++) {
            Attribute::create([
                'attribute_id' => $request['cat_id'],
                'attribute_n_az' => $request['ad_az'][$i],
                'attribute_n_en' => $request['ad_en'][$i],
                'attribute_n_ru' => $request['ad_ru'][$i],
            ]);
        }

        Session::flash('mesaj', 'Atribut Əlavə olundu.');
        return \Redirect::to('/attribute_list');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cat = AttributeGroup::where('destroy', 0)->get();
        $attributes = Attribute::where('attribute_id', $id)->get();
        return view('admin.attribute_edit', compact('attributes', 'cat', 'id'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if (!empty($request['old_attr_az']) and $request['current_attr_az']) {
            $diff = array_diff($request['old_attr_az'], $request['current_attr_az']);
            foreach ($diff as $dif) {
                DB::table('attributes')
                    ->where('id', $dif)
                    ->delete();
            }

        } else if (empty($request['current_attr_az']) and !empty($request['old_attr_az'])) {

            foreach ($request['old_attr_az'] as $dif) {
                DB::table('attributes')
                    ->where('id', $dif)
                    ->delete();
            }
        }

        if ($request['current_attr_az']) {
            for ($i = 0; $i < count($request['ad_az']); $i++) {
                Attribute::where('id', $request['current_attr_az'][$i])->update([
                    'attribute_id' => $request['cat_id'],
                    'attribute_n_az' => $request['ad_az'][$i],
                    'attribute_n_en' => $request['ad_en'][$i],
                    'attribute_n_ru' => $request['ad_ru'][$i],
                ]);
            }
        }

        if($request['new_ad_az']){
            for ($i = 0; $i < count($request['new_ad_az']); $i++) {
                Attribute::create([
                    'attribute_id' => $request['cat_id'],
                    'attribute_n_az' => $request['new_ad_az'][$i],
                    'attribute_n_en' => $request['new_ad_en'][$i],
                    'attribute_n_ru' => $request['new_ad_ru'][$i],
                ]);
            }
        }

        Session::flash('mesaj', 'Atribut Əlavə olundu.');
        return \Redirect::to('/attribute_list');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Attribute::where('attribute_id',$id)->update([
            'destroy'=>1
        ]);
        Session::flash('mesaj', 'Atribut silindi.');
        return \Redirect::to('/attribute_list');
    }
}
