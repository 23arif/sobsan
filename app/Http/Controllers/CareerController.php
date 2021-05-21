<?php

namespace App\Http\Controllers;

use App\Career;
use App\CareerTranslate;
use App\DiscountCard;
use App\DiscountCardTranslate;
use App\Esas;
use App\Http\Requests;
use App\Http\Requests\CatRequest;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Image;
use Str;
use Session;


class CareerController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $careers = Career::where('destroy', 0)->get();
        return view('admin.career_list', compact('careers'));
    }

    public function create()
    {
        return view('admin.career_add');
    }

    public function store(Request $request)
    {
        

        $career = Career::create([
            'start_date'=>$request['start_date'],
            'end_date'=>$request['end_date'],
            'active'=>0,
            'destroy'=>0,
        ])->id;

        for($i=0;$i<count($request->lang);$i++){
            CareerTranslate::create([
                'career_id' => $career,
                'title' => $request['title'][$i],
                'text' => $request['text'][$i],
                'short_text' => $request['short_text'][$i],
                'lang' => $request['lang'][$i],
                'slug' => Str::slug($request['title'][$i]),
            ]);
        }


        Session::flash('mesaj', 'Vakansiya Əlavə olundu.');
        return \Redirect::to('/career_list');
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        $career = Career::where('id', $id)->first();

        return view('admin.career_edit', compact('career'));
    }


    public function update(Request $request, $id)
    {

        
       

        


        $updateCareer = Career::find($id);
        $updateCareer->start_date = $request['start_date'];
        $updateCareer->end_date = $request['end_date'];
       
        $updateCareer->save();
        
        for ($k = 0; $k < count($request->lang); $k++) {
            CareerTranslate::where('career_id', $id)->where('lang', $request['lang'][$k])->update([
                'title' => $request['title'][$k],
                'short_text' => $request['short_text'][$k],
                'text' => $request['text'][$k],
                'slug' => Str::slug($request['title'][$k]),
                
            ]);
        }


        return \Redirect::back()
            ->with('message', 'Banner uğurla dəyişdirildi');
    }

    public function destroy($id)
    {
          Career::where('id',$id)->update(['destroy'=>1]);
          return redirect('/career_list');
    }

    
}
