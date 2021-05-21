<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class ParamController extends Controller
{
    public function index(){

        return view('admin.param');

    }
}
