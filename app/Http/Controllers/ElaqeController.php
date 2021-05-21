<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;



use Auth;

use App\Elaqe;

class ElaqeController extends Controller
{

    public function __construct()
    {

        $this->middleware('auth');


    }

    public function index()
    {
        $elaqe = Elaqe::all();
        return view('admin.elaqe',compact('elaqe'));

    }

    public function create()
    {

        return view('admin.elaqeadd');
    }

    public function store(Request $request)
    {
//        $data = $request->input();
        $this->validate($request,[

            'elaqe'=>'required',

        ]);
//        $add = new AboutController;
//        $add->about = $request['about'];
//        $add->save();
        Elaqe::create([

            'elaqe' => $request['elaqe'],

        ]);
        return redirect('/admins/elaqe');
    }


    public function show($id)
    {

    }


    public function edit($id)
    {

        $elaqea= Elaqe::findOrFail($id);

        return view('admin.elaqeedit', compact('elaqea'));
    }


    public function update(Request $request, $id)
    {

        $data = $request->input();
        $elaqea = Elaqe::find($id);
        $elaqea->elaqe = $data['elaqe'];
        $elaqea ->save();


        return redirect('admins/elaqe');


    }

    public function destroy($id)
    {
        Elaqe::find($id)->delete();

        return redirect('admins/elaqe');


    }
}
