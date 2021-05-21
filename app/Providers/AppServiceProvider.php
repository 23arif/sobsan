<?php

namespace App\Providers;

use App\AltNews;
use App\Basket;
use App\Branch;
use App\Category;
use App\Event;
use App\Menu;
use App\EventCategory;
use App\HomeDetails;
use App\WishList;
use App\Yanson;
use App\DiscountCard;

use DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\ServiceProvider;
use Lang;
use Session;
use View;
use Illuminate\Support\Facades\URL;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
         URL::forceScheme('https');

        View::composer('*', function ($view) {

            if(Session::get('uid')){
                $uid = Session::get('uid');
            }else{
                $uid = date('his').rand(111111,999999);
                Session::put('uid', $uid);
            }

            $settings = Yanson::first();
            $home = HomeDetails::where('lang',Session('lang'))->first();
            if (Session::has('lang')) {
                $lang = Session::get('lang');

                app()->setLocale($lang);
            }
            if (Auth::user()) {
                $cartQty = count(Basket::where('user_id', Auth::id())->get());
                $wishCount = count(WishList::where('user_id', Auth::id())->get());
                $view->with([
                    'cartQty' => $cartQty,
                    'wishCount' => $wishCount,
                ]);
            }else{
                $cartQty = count(Basket::where('user_id', Session('uid'))->get());
                $wishCount = count(WishList::where('user_id', Session('uid'))->get());
                $view->with([
                    'cartQty' => $cartQty,
                    'wishCount' => $wishCount,
                ]);
            }

            if (Auth::user()){
                $user_id = Auth::id();
            }else{
                $user_id = Session('uid');
            }
            $cats = Category::with('parent', 'children')->where(['parent' => 0])->get();
            $menus = Menu::all();
            $discount = DiscountCard::where('switch',1)->first();
            $branches = Branch::where('destroy',0)->get();

            
            $view->with([
                'cats' => $cats,
                'home' => $home,
                'branches' => $branches,
                'discount' => $discount,
                'menus' => $menus,
                'settings' => $settings,
                'uid' => $user_id,
            ]);
        });

    }


    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
