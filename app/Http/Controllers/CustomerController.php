<?php

namespace App\Http\Controllers;

use App\Basket;
use App\Http\Requests;
use App\Mail\Forget_mail;
use App\Mail\User_mail;
use App\User;
use App\WishList;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Lang;
use Mail;
use Str;
use Validator;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($locale)
    {
        if (Auth::user()) {
            abort(404);
        } else {
            $cUrl = __('routes.viewRegister');
            return view('Sobsan.viewregister', compact('cUrl'));
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $locale)
    {


        $validator = Validator::make($request->all(), [
            'companyName' => 'required',
            'nameSurname' => 'required',
            'email' => 'required',
            'password' => 'required',
            'repeatPass' => 'required',
            'address' => 'required',
            'tel' => 'required',
        ]);
        if ($validator->fails()) {
            return \Redirect::back()
                ->with('message', __('esas.registerWarning'));
        }
        if ($request['password'] == $request['repeatPass']) {

            $checkEmailOnDb = User::where('email', $request['email'])->first();
            if ($checkEmailOnDb) {
                return \Redirect::back()
                    ->with('message', __('esas.emailExists'));
            } else {
                $confirm_code = Str::random(10);
                User::create([
                    'name' => $request['nameSurname'],
                    'company_name' => $request['companyName'],
                    'email' => $request['email'],
                    'password' => Hash::make($request['password']),
                    'address' => $request['address'],
                    'telefon' => $request['tel'],
                    'about' => 'user',
                    'confirm_code' => $confirm_code,

                ]);

                $details = [
                    'login' => $request['email'],
                    'password' => $request['password'],
                    'url' => url(Lang::getLocale() . '/user_active/' . $confirm_code),
                ];

                Mail::to($request['email'])->send(new User_mail($details));
            }

            return \Redirect::back()
                ->with('message', __('esas.registerCompleted'));
        } else {
            return \Redirect::back()
                ->with('message', __('esas.passRepeatWarning'));
        }
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */

    public function user_active($locale, $code)
    {

        $cUrl = __('routes.yeni');
        $customer = User::where('confirm_code', $code)->first();

        if (isset($customer->id)) {

            $user = User::where('id', $customer->id)->update(array(
                'active' => 1,
            ));
            $message = __('esas.registerCompleted2');
        } else {
            $message = __('esas.adminLoginAlert');
        }


        return view('Sobsan.user_active', compact('message', 'cUrl'));
    }

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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $locale, $id)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required',
        ]);
        if ($validator->fails()) {
            return \Redirect::back()
                ->with('message', __('esas.registerWarning'));
        }
        $currentUser = User::where('email', Auth::user()->email)->first();

        if ($request['password'] == null) {
            $currentUser->update([
                'company_name' => $request['company_name'],
                'name' => $request['name'],
                'email' => $request['email'],
                'password' => $currentUser->password,
                'address' => $request['address'],
                'city' => $request['city'],
                'telefon' => $request['tel'],
            ]);
        } else {
            $currentUser->update([
                'company_name' => $request['company_name'],
                'name' => $request['name'],
                'email' => $request['email'],
                'password' => Hash::make($request['password']),
                'address' => $request['address'],
                'telefon' => $request['tel'],
            ]);
        }
        return \Redirect::back()
            ->with('updatedUser', __('esas.updatedUser'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
    }

    public function login(Request $request, $locale)
    {
        $getUser = User::where(['email' => $request['email']])->first();
        if($getUser){
        if ($getUser->active == 1) {
            if (isset($getUser)) {
                if (Hash::check($request['password'], $getUser->password)) {
                    if ($getUser->role != 0) {
                        return \Redirect::back()->with('message', __('esas.adminLoginAlert'));
                    }
                    Auth()->login($getUser);

                    Basket::where('user_id', Session('uid'))->update(array(
                        'user_id' => Auth::user()->id,
                    ));
                    Wishlist::where('user_id', Session('uid'))->update(array(
                        'user_id' => Auth::user()->id,
                    ));
                    return Redirect::route('homepage', ['locale' => Session('lang')]);
                } else {
                    return \Redirect::back()->with('message', __('esas.sifreYanlisdir'));
                }
            } else {
                return \Redirect::back()->with('message', __('esas.sifreYanlisdir'));
            }
        } else {
            return \Redirect::back()->with('message', 'Zəhmət olmasa hesabınızı aktivləşdirin.');
        }}else{
            return \Redirect::back()->with('message', __('esas.adminLoginAlert'));
        }

    }

    public function forgot(Request $request)
    {
        $getUser = User::where('email', $request['email'])->first();
        if ($getUser) {
            if ($getUser && $getUser->confirm_code != null) {
                $details = [
                    'url' => url(Lang::getLocale() . '/confirm-code/' . $getUser->confirm_code),
                ];
                Mail::to($request['email'])->send(new Forget_mail($details));

            } else {
                $confirm_code = Str::random(10);
                User::where('email', $request['email'])->update([
                    'confirm_code' => $confirm_code
                ]);
                $details = [
                    'url' => url(Lang::getLocale() . '/confirm-code/' . $confirm_code),
                ];
                Mail::to($request['email'])->send(new Forget_mail($details));
            }
            return back()->with('message', 'Yeni şifrəniz ilə giriş etmək üçün e-poçt ünvanınıza keçid göndəriləcək.');
        } else {
            return back()->with('noUser', 'İstifadəçi tapılmadı.');
        }
    }
}
