<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Support\Facades\Input;
use Session;

class LangController extends Controller
{
    public function index($locale,$lang)
    {
        $langs = ['en', 'az', 'ru'];
        if (in_array($lang, $langs)) {
            Session::put('lang', $lang);
            app()->setLocale($lang);
            return back();
        } else {
            return back();
        }
    }
}
