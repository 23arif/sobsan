<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Laravel\Socialite\Facades\Socialite;
use DB;

class FacebookLoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }


     public function redirectToProvider()
    {
        return Socialite::driver('facebook')->redirect();
    }

    /**
     * Obtain the user information from GitHub.
     *
     * @return \Illuminate\Http\Response
     */
    public function handleProviderCallback()
    {
        
        
        if(!isset($_SESSION['email'])){
            $user = Socialite::driver('facebook')->stateless()->user();
            
            if(empty($user->email)){
                $user->email = $user->name;
            }
            
            
        
        $user_table = DB::table('customers')->where('email',$user->email)->first();
        
        
        if(!isset($user_table->email)){
            DB::table('customers')->insert(
                array(
                'name'   =>   $user->name,
                'email' => $user->email,
                'type' => 'facebook'
                )
            );
            $_SESSION['email'] = $user->email;
            return redirect()->guest('/');
        }else{
            $_SESSION['email'] = $user->email;
            return redirect()->guest('/');
        }
        }else{
            return redirect()->guest('/');
        }

        return $user->name;
    }
}
