<?php

namespace App\Http\Controllers;

use App\Artboard;
use App\ArticleTranslate;
use App\Banner;
use App\Basket;
use App\Category;
use App\Branch;
use App\CategoryTranslate;
use App\Department;
use App\Career;
use App\CareerTranslate;
use App\PrCats;
use App\DepartmentTranslate;
use App\Elave;
use App\ElaveTranslate;
use App\Mail\Contact_mail;
use App\Order;
use App\Partner;
use App\PrDesc;
use App\PrImage;
use App\Products;
use App\Article;
use App\ArticleGallery;
use App\Slider;
use App\User;
use App\ActionTranslate;
use App\WishList;
use App\Actions;
use App\Yanson;
use App\Gallery;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use InteractsWithSockets;
use Lang;
use Mail;
use SerializesModels;
use Session;
use Str;
use Validator;


class SiteController extends Controller
{
    public function index()
    {
        $lang = [
            'az' => '/',
            'ru' => '/ru',
            'en' =>'/en',
        ];
        $sliders = Slider::all();
        $banners = Banner::where('destroy',0)->get();
        $news = Actions::where('destroy',0)->orderby('id','DESC')->limit(3)->get();
        $videos = Gallery::where('type','video')->where('important',0)->get();
        $important_video = Gallery::where('type','video')->where('important',1)->first();
        $class="home";

        return view('view.index',compact('lang','sliders','banners','news','videos','important_video','class'));
    }

    public function branch()
    {
        $lang = [
            'az' => '/xidmet-sebekesi',
            'ru' => '/ru/servisnaya-set',
            'en' =>'/en/service-network',
        ];

        $branches = Branch::where('destroy',0)->get();
        
        
        
        return view('view.branch', compact('lang','branches'));
    }

    public function haqqimizda()
    {
        $lang = [
            'az' => '/haqqimizda',
            'ru' => '/ru/o-nas',
            'en' =>'/en/about-us',
        ];
        $about = Article::where('type','about')->first();
        $videos = ArticleGallery::where('article_id',$about->id)->get();
        
        
        return view('view.about', compact('lang', 'about','videos'));
    }

    public function career()
    {
        $lang = [
            'az' => '/career',
            'ru' => '/ru/career',
            'en' =>'/en/career',
        ];
        $careers = Career::where('destroy',0)->get();
       
        
        
        return view('view.career', compact('lang', 'careers'));
    }

    public function career_inner($slug)
    {
        $career = CareerTranslate::where('slug',$slug)->first();
        $career_slugs = CareerTranslate::where('career_id',$career->career_id)->get(); 
        $lang = [
            'az' => '/career/'.$career_slugs->where('lang','az')->first()->slug,
            'ru' => '/ru/career/'.$career_slugs->where('lang','ru')->first()->slug,
            'en' =>'/en/career/'.$career_slugs->where('lang','en')->first()->slug,
        ];
        $career_details = Career::where('id',$career->career_id)->first();
       
        
        
        return view('view.career_inner', compact('lang', 'career','career_details'));
    }

    public function paymentdelivery()
    {
        $lang = [
            'az' => '/odenis-ve-catdirilma',
            'ru' => '/ru/oplata-i-dostavka',
            'en' =>'/en/payment-and-delivery',
        ];
        $about = Article::where('type','catdirilma')->first();
        $videos = ArticleGallery::where('article_id',$about->id)->get();
        
        
        return view('view.about', compact('lang', 'about','videos'));
    }

    public function zemanet()
    {
        $lang = [
            'az' => '/zemanet-sertleri',
            'ru' => '/ru/usloviya-garantii',
            'en' =>'/en/warranty-terms',
        ];
        $about = Article::where('type','zemanet')->first();
        $videos = ArticleGallery::where('article_id',$about->id)->get();
        
        
        return view('view.about', compact('lang', 'about','videos'));
    }

    public function news()
    {
        $lang = [
            'az' => '/aksiyalar-ve-xeberler',
            'ru' => '/ru/akcii-i-novosti',
            'en' =>'/en/promotions-and-news',
        ];

        $news = Actions::where('destroy',0)->get();
        
        
        return view('view.news', compact('lang', 'news'));
    }

    public function news_read($slug)
    {
        $new = ActionTranslate::where('slug',$slug)->first();
        $new_slugs = ActionTranslate::where('action_id',$new->action_id)->get();
        $lang = [
            'az' => '/aksiyalar-ve-xeberler/'.$new_slugs->where('lang','az')->first()->slug,
            'ru' => '/ru/akcii-i-novosti/'.$new_slugs->where('lang','ru')->first()->slug,
            'en' =>'/en/promotions-and-news/'.$new_slugs->where('lang','en')->first()->slug,
        ];
        $new_details = Actions::where('id',$new->action_id)->first();
        return view('view.new_read', compact('lang', 'new','new_details'));
    }

    public function contact()
    {
        $lang = [
            'az' => '/bizimle-elaqe',
            'ru' => '/ru/svyazites-s-nami',
            'en' =>'/en/contact-us',
        ];
        return view('view.contact', compact('lang'));
    }

    public function category($slug){
        $category = CategoryTranslate::where('slug',$slug)->first();
        $category_slug = CategoryTranslate::where('cat_id',$category->cat_id)->get();
        $products = PrCats::where('cat_id',$category->cat_id)->get();


        $lang = [
            'az' => '/'.$category_slug->where('lang','az')->first()->slug,
            'ru' => '/ru/'.$category_slug->where('lang','ru')->first()->slug,
            'en' =>'/en/'.$category_slug->where('lang','en')->first()->slug,
        ];
        return view('view.category', compact('lang','category','products'));
    }

    public function product($slug){
        $product = PrDesc::where('slug',$slug)->first();
        $product_slugs = PrDesc::where('pr_id',$product->pr_id)->get();
        $pr_details = Products::where('id',$product->pr_id)->first();
        $images = PrImage::where('pr_id',$product->pr_id)->get();
        $product_categories = PrCats::where('pr_id',$product->pr_id)->get();
        
        $lang = [
            'az' => '/'.$product_slugs->where('lang','az')->first()->slug,
            'ru' => '/ru/'.$product_slugs->where('lang','ru')->first()->slug,
            'en' =>'/en/'.$product_slugs->where('lang','en')->first()->slug,
        ];
        return view('view.products', compact('lang','product','pr_details','images','product_categories'));
    }

    public function search(Request $request, $locale)
    {
        $cUrl = __('routes.mainSearch');
        $r = $request->input('search');
        if ($r == null) {
            return view('Sobsan.main_search', compact('cUrl'))->with('message', __('esas.msearch'));;
        }
        $products = PrDesc::where('title', 'LIKE', "%" . $r . "%")->where('lang', Session('lang'))->get();
        return view('Sobsan.main_search', compact('cUrl', 'products'));
    }

    public function login($locale)
    {
        $cUrl = __('routes.viewLogin');
        if (Auth::user()) {
            abort(404);
        } else {
            return view('Sobsan.viewlogin', compact('cUrl'));
        }
    }

    

    

    public
    function elaqe($locale)
    {
        $cUrl = __('routes.elaqe');
        $settings = Yanson::where('id', 49)->first();
        return view('Sobsan.elaqe', compact('cUrl', 'settings'));
    }

    public
    function contact_send($locale, Request $request)
    {

        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'title' => 'required',
            'email' => 'required',
            'message' => 'required',

        ]);

        $details = [
            'name' => $request['name'],
            'title' => $request['title'],
            'email' => $request['email'],
            'message' => $request['message'],

        ];
        $email = 'info@los.az';
        Mail::to($email)->send(new Contact_mail($details));
        return back();
    }

    

    public function forgetPass($locale)
    {
        $cUrl = __('routes.resetPass');
        return view('Sobsan.reset_pass', compact('cUrl'));
    }

    public function confirmPass($locale, $code)
    {
        if (isset($_POST['password'])) {
            if ($_POST['password'] == $_POST['repeatpassword']) {
                $getUser = User::where('confirm_code', $code)->first();
                if ($getUser) {
                    $getUser->update([
                        'password' => Hash::make($_POST['password'])
                    ]);
                    Auth()->login($getUser);
                    return \Redirect::to('https://los.az/az/sexsi-kabinet');
                } else {
                    return \Redirect::back()->with('message', 'Istifadəçi tapılmadı.');
                }
            } else {
                return \Redirect::back()->with('message', 'Şifrələr eyni deyil.');
            }
        } else {
            $cUrl = __('routes.resetPass');
            return view('Sobsan.confirm_pass', compact('cUrl'));
        }

    }

    public function invoice($id)
    {
        $order = Order::where('id', $id)->first();
        return view('admin.invoice', compact('order'));
    }

}
