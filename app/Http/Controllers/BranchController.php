<?php

namespace App\Http\Controllers;

use App\Branch;
use App\BranchTranslate;
use App\Http\Requests;
use App\Http\Requests\CatRequest;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Image;
use Str;
use Session;


class BranchController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $branches = Branch::where('destroy', 0)->get();
        return view('admin.branch_list', compact('branches'));
    }

    public function create()
    {
        return view('admin.branch_add');
    }

    public function store(Request $request)
    {
        

        $branch = Branch::create([
            'phone_number'=>$request['phone_number'],
            'map_link'=>$request['map_link'],
        ])->id;

        for($i=0;$i<count($request->lang);$i++){
            BranchTranslate::create([
                'branch_id' => $branch,
                'name' => $request['name'][$i],
                'address' => $request['address'][$i],
                'lang' => $request['lang'][$i],
            ]);
        }


        Session::flash('mesaj', 'Filial Əlavə olundu.');
        return \Redirect::to('/branch_list');
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        $branch = Branch::where('id', $id)->first();
        return view('admin.branch_edit', compact('branch'));
    }


    public function update(Request $request, $id)
    {

        
       

        


        $updateBranch = Branch::find($id);
        $updateBranch->map_link = $request['map_link'];
        $updateBranch->phone_number = $request['phone_number'];
       
        $updateBranch->save();
        
        for ($k = 0; $k < count($request->lang); $k++) {
            BranchTranslate::where('branch_id', $id)->where('lang', $request['lang'][$k])->update([
                'name' => $request['name'][$k],
                'address' => $request['address'][$k],
                
            ]);
        }


        return \Redirect::back()
            ->with('message', 'Filial uğurla dəyişdirildi');
    }

    public function destroy($id)
    {
          Branch::where('id',$id)->update(['destroy'=>1]);
          return redirect('/branch_list');
    }

   
}
