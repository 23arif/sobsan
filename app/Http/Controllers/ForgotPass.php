<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Str;

class ForgotPass extends Controller
{
    public function sendMail($locale){
        return Str::random(10);
    }

    public function index()
    {
        //
    }
    public function create()
    {
        //
    }

    public function store(Request $request)
    {

    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
