<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

use DB;
use URL;




use PHPMailer\PHPMailer\PHPMailer;

use Intervention\Image\ImageManagerStatic as Image;

class login_controller extends Controller
{



    public function login(Request $request){

        
    

            
    
        if (isset($request['signin'])) {

            if($request['signin'] == 'signin'){

                

                $mail = $request['email'];
                $password = md5($request['password']);


                   
                if ($mail && $password) {

                   

        



                    $users_count = DB::table('customers')
                         ->where('email', '=', $mail)
                         ->where('password', '=', $password)
                         ->where('type', '=', 'user')
                         ->count();

                          
                    

                    if ($users_count > 0) {
                        
                        $_SESSION['email'] = $mail;
                        $_SESSION['password'] = $password;
                    
                        return redirect()->to('/');
                    }else{
                        return redirect()->back()->with('error_message', 'Belə bir isdifadəçi mövcud deyil.');
                        
                    }
                    
                }
            }else{
                return redirect()->back()->with('error_message', 'Belə bir isdifadəçi mövcud deyil.');
            }

            }



  

        
        return view('/');
    }


    public function session_destroy()
{


    \Auth::logout();
    session_unset();
    /*return redirect(property_exists($this, 'redirectAfterLogout') ? $this->redirectAfterLogout : '/');*/
        return back();
    //these attempts will not remove values from the session.....

    //session()->forget('db');
    //\Session::flush();


}

}
