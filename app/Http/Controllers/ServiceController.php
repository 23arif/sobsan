<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Http\Requests\NewsRequest;

use Auth;
use App\Service;
use App\Alt;
use App\Esas;
use Validator;
use Response;
use Redirect;
use Session;
use App\Fotolent;
use App\AltNews;
use App\News;
use App\Yanson;
use App\Events\PostHasViewed;
use Jenssegers\Date\Date;
use Illuminate\Support\Facades\Input;
use Image;
use DB;

class ServiceController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
        Date::setLocale('nl');
    }

    public function index()
    {

        $news = Service::orderBy('created_at', 'desc')->where('type','service')->paginate(15);

        return view('admin.service', compact('news'));

        // return $news;
    }


    public function create()
    {
        $blognewsCatCreate =  Esas::with('parent','children')->whereNull('parent')->orderBy('id','desc')->get();
        $ys = Yanson::all();
        
        return view('admin.service_add', compact('ys','blognewsCatCreate'));
    }


    public function store(Request $request)
    {


        if($request['img']){
          $avatar = $request['img'];
      
        $filename = time() . '.' . $avatar->getClientOriginalName();
        Image::make($avatar)->save(public_path('/block/'.$filename));
           
        }else{
            $filename = "";
          }





        $aksiya_id = News::create([
          'xeber_ad' => $request['basliq'],
          'xeber_ardi' => $request['xeber_ardi'],
          'xeber_ozu' => $request['xeber_ozu'],
          'created_at' => date('Y-m-d H:i:s', strtotime($request['tarix'])),
          'updated_at' => date('Y-m-d H:i:s', strtotime($request['tarix'])),
          'latin_xeber' => str_slug($request['basliq'], '-'),
          'ysreng' => $filename,
          'type' => 'service',
          'lang' => $request['lang'],
         

        ])->id;

       

       



        return \Redirect::to('/service')->with('message', ' Mətniniz uğurla əlavə edildi');
    }

    public function show($id)
    {
        $newsb = News::findOrFail($id);

        return view('admin.newsshow',compact('newsb'));
    }

    public function edit($id)
    {
      
        $ys = Yanson::all();
        $newsEdit = Service::with('kateler')->findOrFail($id);
        

        return view('admin.serviceedit', compact('newsEdit','ys'));
    }

    public function update(Request $request, $id)
    {
      
       



        if($request['img']){
           $avatar = $request['img'];
      
        $filename = time() . '.' . $avatar->getClientOriginalName();
        Image::make($avatar)->save(public_path('/block/'.$filename));
      }else{
        $filename=$request['old_img'];
      }


        $updateService = Service::find($id);
        $updateService->xeber_ad = Input::get('xeber_ad');
        $updateService->xeber_ozu  = Input::get('xeber_ozu');
        $updateService->xeber_ardi  = Input::get('xeber_ardi');
        $updateService->created_at  = date('Y-m-d H:i:s', strtotime(Input::get('tarix')));
        $updateService->latin_xeber = str_slug(Input::get('xeber_ad'), '-');
        $updateService->ysreng = $filename;
        $updateService->save();

       



        return \Redirect::to('/service')
                ->with('message', 'Mətniniz uğurla dəyişdirildi');
    }

    public function destroy($id)
    {

               
              Service::findOrFail($id)->delete();

              
        return redirect('/service')->with('message', 'Mətniniz  silindi');;
    }

}
