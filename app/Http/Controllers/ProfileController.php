<?php

namespace App\Http\Controllers;


use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\NewregisterRequest;

use App\Http\Requests\ProfileRequest;

use App\Http\Requests\ImageRequest;

use Illuminate\Support\Facades\Redirect;
use Intervention\Image\Facades\Image;

use Illuminate\Support\Facades\Input;

use Auth;

use App\News;

use App\Alt;

use App\Esas;

use App\User;

use Session;


class ProfileController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {

        $user = Auth::User();
        $bugun = News::where('created_at', '>', date('Y-m-d H:i:s', time() - 24 * 3600))->count();
        $hefte = News::where('created_at', '>', date('Y-m-d H:i:s', time() - 7 * 24 * 3600))->count();
        $ayliq = News::where('created_at', '>', date('Y-m-d H:i:s', time() - 30 * 24 * 3600))->count();
        $illik = News::where('created_at', '>', date('Y-m-d H:i:s', time() - 365 * 24 * 3600))->count();
        return view('admin.profil', compact('user', 'bugun', 'hefte', 'ayliq', 'illik'));

    }

    public function editProfile(ProfileRequest $request)
    {

        $data = $request->input();
        $user = Auth::user();

        if (mb_strlen($data['oldpass']) > 0 || mb_strlen($data['newpass']) > 0) {
            if (\Hash::check($data['oldpass'], $user->password)) {
                $new_password = \Hash::make($data['newpass']);
            } else {
                return \Redirect::back()->withErrors(['Köhnə parol səhvdir']);
            }

        } else {
            $new_password = $user->password;

        }

        $update = User::findOrFail($user->id);
        $update->name = $data['ad'];
        $update->email = $data['email'];
        $update->address = $data['unvan'];
        $update->telefon = $data['mobil'];
        $update->about = $data['about'];
        $update->password = $new_password;
        $update->save();

        return \Redirect::to('/profil')
            ->with('message', 'Dəyişildi');

    }

    public function upload(ImageRequest $request)
    {


        $data = Input::file('pic');
        $user = Auth::user();
        if ($data) {
            $imageName = 'user' . $user->id . '.' . $data->getClientOriginalExtension();
            $imagePath = public_path('userphotos/' . $imageName);
            Image::make($data->getRealPath())
                ->orientate()
                ->resize(666, 260)
                ->save($imagePath);

            $myImage = 'userphotos/' . $imageName;


            $update = User::findOrFail($user->id);
            $update->cover = $myImage;
            $update->save();
        }else{

            return \Redirect::to('/profil')
                ->withErrors(['cover'=>'Sekil Secilmeyib']);

        }
        return \Redirect::to('/profil')
            ->with('message', 'Dəyişildi');

    }


    public function profilpicture(ImageRequest $request)
    {


        $data = Input::file('cover');
        $user = Auth::user();
        if ($data) {
            $imageName = 'user' . $user->id . '.' . $data->getClientOriginalExtension();
            $imagePath = public_path('userprofil/' . $imageName);
            Image::make($data->getRealPath())
                ->orientate()
                ->resize(666, 260)
                ->save($imagePath);

            $myImage = 'userprofil/' . $imageName;

            $update = User::findOrFail($user->id);
            $update->imageProfil = $myImage;
            $update->save();
        }else{

            return \Redirect::to('/profil')
                ->withErrors(['imageP'=>'Sekil Secilmeyib']);

        }

        return \Redirect::to('/profil')
            ->with('message', 'Dəyişildi');

    }

    public function delprofilpicture()
    {

        $user = Auth::user();
        $update = User::findOrFail($user->id);
        if (file_exists($user->imageProfil) && $user->imageProfil != '/assets/img/backgrounds/ball.png') {
            unlink($user->imageProfil);

            $update->imageProfil = '/assets/img/backgrounds/ball.png';
            $update->save();
        }

        return \Redirect::to('/profil')
            ->with('message', 'Silindi');


    }

    public function delprofilcover()
    {

        $user = Auth::user();
        $update = User::findOrFail($user->id);
        if (file_exists($user->cover) && $user->cover != '/assets/img/backgrounds/logo.png') {
            unlink($user->cover);

            $update->cover = '/assets/img/backgrounds/logo.png';
            $update->save();
        }

        return \Redirect::to('/profil')
            ->with('message', 'Silindi');


    }



    public function newregshow()
    {
        return view('auth.register');
    }



    public function newreg(NewregisterRequest $request)
    {
        $data = $request->input();



       User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            'role' => 2,
        ]);




        if($number == 0){
          Session::flash('mesaj', 'Qeydiyyat tamamlandı. Admin tərəfindən təsdiqləndikdən sonra daxil ola bilərsiniz ');
          return Redirect::to('/');
        }else{
          return Redirect::to('/home')
              ->with('message', 'İstifadəçi qeyd oldu');
        }
    }

    public function allUsers(){

        $admins = User::where('role','2')->get();

        return view('admin.adminslist',compact('admins'));


    }



}
