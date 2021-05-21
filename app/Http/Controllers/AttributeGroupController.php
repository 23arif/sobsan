<?php

namespace App\Http\Controllers;

use App\AttributeGroup;
use App\Category;
use Illuminate\Http\Request;
use Session;

class AttributeGroupController extends Controller
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
        $groups = AttributeGroup::where('destroy', 0)->orderBy('tindex')->get();
        return view('admin.attribute_group_list', compact('groups'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cat = Category::all();
        return view('admin.attribute_group_add', compact('cat'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        AttributeGroup::create([
            'cat_id' => $request['cat_id'],
            'group_n_az' => $request['ad_az'],
            'group_n_en' => $request['ad_en'],
            'group_n_ru' => $request['ad_ru'],
        ]);

        Session::flash('mesaj', 'Atribut Grupu Əlavə olundu.');
        return \Redirect::to('/attribute_group_list');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cat = Category::all();
        $group = AttributeGroup::where('id', $id)->first();
        return view('admin.attribute_group_edit', compact('group', 'cat'));
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
        AttributeGroup::where('id', $id)->update([
            'cat_id' => $request['cat_id'],
            'group_n_az' => $request['ad_az'],
            'group_n_en' => $request['ad_en'],
            'group_n_ru' => $request['ad_ru'],
        ]);

        Session::flash('mesaj', 'Atribut Grupu yeniləndi.');
        return \Redirect::to('/attribute_group_list');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        AttributeGroup::where('id', $id)->update(['destroy' => 1]);
        Session::flash('mesaj', 'Atribut Grupu silindi.');
        return \Redirect::to('/attribute_group_list');
    }

    public function sort(Request $request)
    {
        $posts = AttributeGroup::all();
        foreach ($posts as $post) {
            foreach ($request->order as $order) {
                if ($order['id'] == $post->id) {
                    $post->update(['tindex' => $order['position']]);
                }
            }
        }
        return response('Update Successfully.', 200);
    }
}
