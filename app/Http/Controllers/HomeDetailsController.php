<?php

namespace App\Http\Controllers;

use App\HomeDetails;
use Illuminate\Http\Request;

class HomeDetailsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        $details = HomeDetails::all();
        return view('admin.homedetails', compact('details'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        if ($request['main_video']) {
            $file = $request->main_video;
            $file_name = $file->getClientOriginalName();
            $file_size = round($file->getSize() / 1024);
            $file_ex = $file->getClientOriginalExtension();
            $file_mime = $file->getMimeType();
            $newname = $file_name;
            $file_name = time() . $file->getClientOriginalName();
            $file->move('public/Gallery', $file_name);
        } else {
            $file_name = '';
        }

        for ($i = 0; $i < count($request->lang); $i++) {
            HomeDetails::where('lang',$request['lang'][$i])->update([
               'address'=>$request['address'][$i],
               'video_text'=>$request['video_text'][$i],
               'video_title'=>$request['video_title'][$i],
               'copyrights'=>$request['copyrights'][$i],
               'footer_text'=>$request['footer_text'][$i],
               'main_video'=>$file_name,
               'main_video_code'=>$request['main_video_code'],
            ]);
        }
        return \Redirect::to('/home_edit')->with('message', ' Məlumatlar yeniləndi.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
