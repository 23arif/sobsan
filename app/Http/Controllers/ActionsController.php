<?php

namespace App\Http\Controllers;

use App\Actions;
use App\ActionTranslate;
use Illuminate\Http\Request;
use Str;

class ActionsController extends Controller
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
        $actions = Actions::where('destroy', 0)->paginate(12);
        return view('admin.actions', compact('actions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.actions_add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if ($request['img']) {
            $file = $request->img;
            $file_name = $file->getClientOriginalName();
            $file_size = round($file->getSize() / 1024);
            $file_ex = $file->getClientOriginalExtension();
            $file_mime = $file->getMimeType();
            $newname = $file_name;
            $file_name = time() . $file->getClientOriginalName();
            $file->move('public/actions', $file_name);
        } else {
            $file_name = '';
        }
        $action = Actions::create([
            'img' => $file_name
        ])->id;

        for ($i = 0; $i < count($request->lang); $i++) {
            if ($i != 0) {
                ActionTranslate::create([
                    'action_id' => $action,
                    'title' => $request['basliq'][0],
                    'description' => $request['xeber_ardi'][0],
                    'lang' => $request['lang'][$i],
                    'slug' => Str::slug($request['basliq'][0] . '-' . $request['lang'][$i]),
                ]);
            } else {
                ActionTranslate::create([
                    'action_id' => $action,
                    'title' => $request['basliq'][$i],
                    'description' => $request['xeber_ardi'][$i],
                    'lang' => $request['lang'][$i],
                    'slug' => Str::slug($request['basliq'][$i]),
                ]);
            }
        }
        return \Redirect::to('/actions_list')
            ->with('message', 'Aksiya uğurla dəyişdirildi');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $action = Actions::where('id', $id)->first();
        return view('admin.actions_edit', compact('action'));
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
        if ($request['img']) {
            $file = $request['img'];
            $file_name = $file->getClientOriginalName();
            $file_size = round($file->getSize() / 1024);
            $file_ex = $file->getClientOriginalExtension();
            $file_mime = $file->getMimeType();
            $file_name = time() . $file->getClientOriginalName();
            $file->move('public/actions', $file_name);
        } else {
            $file_name = $request['old_img'];
        };

        Actions::where('id', $id)->update([
            'img' => $file_name,
        ]);

        for ($i = 0; $i < count($request->lang); $i++) {
            ActionTranslate::where(['action_id' => $id, 'lang' => $request['lang'][$i]])->update([
                'title' => $request['basliq'][$i],
                'description' => $request['article_ardi'][$i],
                'lang' => $request['lang'][$i],
                'slug' => Str::slug($request['basliq'][$i])
            ]);
        }

        return \Redirect::to('/actions_list')
            ->with('message', 'Aksiya uğurla dəyişdirildi');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Actions::where('id', $id)->update([
            'destroy' => 1
        ]);
        return \Redirect::to('/actions_list')
            ->with('message', 'Aksiya silindi');
    }
}
