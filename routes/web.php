<?php
use App\Http\Controllers\OrderController;

Route::post('/register2', 'SiteController@newreg');

Route::group(['middleware' => 'web'], function () {
    Route::get('/login', 'Auth\AuthController@showLoginForm');
    Route::post('/login', 'Auth\AuthController@login');
    Route::get('/logout', 'Auth\AuthController@logout');

    Route::get('/invoice/{id}', 'SiteController@invoice')->name('invoice');

    Route::get('/users_list', 'UsersController@index')->name('usersList');
    Route::post('/users_update', 'UsersController@update')->name('activateUser');

    Route::get('/product_list', 'ProductController@index')->name('prList');
    Route::get('/product_add', 'ProductController@create')->name('prAdd');
    Route::post('/product_store', 'ProductController@store')->name('storeProduct');
    Route::post('/product_update/{id}', 'ProductController@update')->name('updateProduct');
    Route::get('/product_edit/{id}', 'ProductController@edit');
    Route::get('/product_delete/{id}', 'ProductController@destroy');
    Route::post('/show_hide', 'ProductController@showHide')->name('showProduct');

    Route::get('/order_list', 'OrderController@index');
    Route::post('/order_store', 'OrderController@store')->name('storeOrder');
    Route::get('/order_show/{id}', 'OrderController@show');
    Route::post('/order_update/{id}', 'OrderController@update')->name('updateOrder');
    Route::get('/order_delete/{id}', 'OrderController@destroy');

    Route::get('/article_edit/{type}', 'ArticleController@edit')->name('articleEdit');
    Route::post('/article_update/{id}', 'ArticleController@update');

    Route::get('/slider_list', 'SliderController@index');
    Route::get('/slider_add', 'SliderController@create');
    Route::post('/slider_store', 'SliderController@store');
    Route::get('/slider_edit/{id}', 'SliderController@edit');
    Route::post('/slider_update/{id}', 'SliderController@update');
    Route::get('/slider_delete/{id}', 'SliderController@destroy');


    Route::get('/brend_list', 'BrendController@index');
    Route::get('/brend_add', 'BrendController@create');
    Route::post('/brend_store', 'BrendController@store');
    Route::get('/brend_edit/{id}', 'BrendController@edit');
    Route::post('/brend_update/{id}', 'BrendController@update');
    Route::get('/brend_delete/{id}', 'BrendController@destroy');

    Route::get('/actions_list', 'ActionsController@index');
    Route::get('/actions_add', 'ActionsController@create');
    Route::post('/actions_store', 'ActionsController@store');
    Route::get('/actions_edit/{id}', 'ActionsController@edit');
    Route::post('/actions_update/{id}', 'ActionsController@update');
    Route::get('/actions_delete/{id}', 'ActionsController@destroy');

    Route::get('/branch_list', 'BranchController@index');
    Route::get('/branch_add', 'BranchController@create');
    Route::post('/branch_store', 'BranchController@store');
    Route::get('/branch_edit/{id}', 'BranchController@edit');
    Route::post('/branch_update/{id}', 'BranchController@update');
    Route::get('/branch_delete/{id}', 'BranchController@destroy');

    Route::get('/career_list', 'CareerController@index');
    Route::get('/career_add', 'CareerController@create');
    Route::post('/career_store', 'CareerController@store');
    Route::get('/career_edit/{id}', 'CareerController@edit');
    Route::post('/career_update/{id}', 'CareerController@update');
    Route::get('/career_delete/{id}', 'CareerController@destroy');

    Route::get('/attribute_group_list', 'AttributeGroupController@index');
    Route::get('/attribute_group_add', 'AttributeGroupController@create');
    Route::post('/attribute_group_store', 'AttributeGroupController@store');
    Route::get('/attribute_group_edit/{id}', 'AttributeGroupController@edit');
    Route::post('/attribute_group_update/{id}', 'AttributeGroupController@update')->name('AttrGroupUpdate');
    Route::post('/attribute_group_sort', 'AttributeGroupController@sort')->name('AttrGroupSort');
    Route::get('/attribute_group_delete/{id}', 'AttributeGroupController@destroy');

    Route::get('/attribute_list', 'AttributeController@index');
    Route::get('/attribute_add', 'AttributeController@create');
    Route::post('/attribute_store', 'AttributeController@store');
    Route::get('/attribute_edit/{id}', 'AttributeController@edit');
    Route::post('/attribute_update/{id}', 'AttributeController@update');
    Route::get('/attribute_delete/{id}', 'AttributeController@destroy');


    Route::get('/partner_list', 'PartnerController@index');
    Route::get('/partner_add', 'PartnerController@create');
    Route::post('/partner_store', 'PartnerController@store');
    Route::get('/partner_edit/{id}', 'PartnerController@edit');
    Route::post('/partner_update/{id}', 'PartnerController@update');
    Route::get('/partner_delete/{id}', 'PartnerController@destroy');

    Route::get('/banner_list', 'BannerController@index')->name('bannerList');
    Route::get('/banner_add', 'BannerController@create');
    Route::post('/banner_store', 'BannerController@store')->name('bannerStore');
    Route::get('/banner_edit/{id}', 'BannerController@edit')->name('bannerEdit');
    Route::post('/banner_update/{id}', 'BannerController@update')->name('bannerUpdate');
    Route::get('/banner_delete/{id}', 'BannerController@destroy')->name('bannerDelete');

    Route::get('/video_list', 'VideoGalleryController@index')->name('videoList');
    Route::get('/video_add', 'VideoGalleryController@create');
    Route::post('/video_store', 'VideoGalleryController@store')->name('videoStore');
    Route::get('/video_edit/{id}', 'VideoGalleryController@edit')->name('videoEdit');
    Route::post('/video_update/{id}', 'VideoGalleryController@update')->name('videoUpdate');
    Route::get('/video_delete/{id}', 'VideoGalleryController@destroy')->name('videoDelete');

    Route::get('/home_edit', 'HomeDetailsController@edit');
    Route::post('/home_update', 'HomeDetailsController@update')->name('homeUpdate');

    Route::get('/discount_card_edit/{id}', 'BannerController@discountEdit')->name('discountCardEdit');
    Route::post('/discount_card_active', 'BannerController@activeCard')->name('activeCard');
    Route::post('/discount_card_update/{id}', 'BannerController@discountUpdate')->name('discountCardUpdate');

    Route::get('/promo_list', 'PromocodeController@index')->name('promoList');
    Route::get('/promo_add', 'PromocodeController@create');
    Route::post('/promo_store', 'PromocodeController@store')->name('promoStore');
    Route::get('/promo_edit/{id}', 'PromocodeController@edit')->name('promoEdit');
    Route::post('/promo_update/{id}', 'PromocodeController@update')->name('promoUpdate');
    Route::get('/promo_delete/{id}', 'PromocodeController@destroy')->name('bannerDelete');

    Route::get('/home', 'HomeController@index');

    Route::get('/bolme', 'CatController@index');
    Route::get('/bolme/create', 'CatController@create');
    Route::post('/bolme/store', 'CatController@store');
    Route::get('/bolme/{id}/edit', 'CatController@edit');
    Route::post('/bolme/{id}', 'CatController@update');
    Route::get('/bolme/{id}/del', 'CatController@destroy');

    Route::get('/menu', 'MenuController@index');
    Route::get('/menu/create', 'MenuController@create');
    Route::post('/menu/store', 'MenuController@store');
    Route::get('/menu/{id}/edit', 'MenuController@edit');
    Route::post('/menu/{id}', 'MenuController@update');
    Route::get('/menu/{id}/del', 'MenuController@destroy');

    Route::get('/color', 'ColorsController@index');
    Route::get('/color/create', 'ColorsController@create');
    Route::post('/color/store', 'ColorsController@store');
    Route::get('/color/{id}/edit', 'ColorsController@edit');
    Route::post('/color/{id}', 'ColorsController@update')->name('colorUpdate');
    Route::get('/color/{id}/del', 'ColorsController@destroy');

    Route::get('/profil', 'ProfileController@index');
    Route::put('/profil/edit', 'ProfileController@editProfile');
    Route::put('/profil/upload', 'ProfileController@upload');
    Route::put('/profil/profilpicture', 'ProfileController@profilpicture');
    Route::get('/profil/image/del', 'ProfileController@delprofilpicture');
    Route::get('/profil/cover/del', 'ProfileController@delprofilcover');

    Route::get('/animationwordsadd/','YansonController@index');
    Route::get('/animationwordsadd/{id}/edit',['as' => 'animationwordsadd.edit', 'uses' => 'YansonController@edit']);
    Route::post('/animationwordsadd/{id}',['as' => 'animationwordsadd.update', 'uses' => 'YansonController@update']);
    Route::get('/animationwordsadd/{id}/del', ['as' => 'animationwordsadd.destroy', 'uses' => 'YansonController@destroy']);
});




$locale = Request::segment(1);

if(in_array($locale, ['en','ru'])){
   $locale = Request::segment(1);
}else{
    

    $locale = '';
}

Route::group([
        'prefix' => $locale, function ($locale = null) {
    return $locale;
},
    'where' => ['locale' => '[a-zA-Z]{2}'],
    'middleware' => 'setlocale'], function () {

    Route::get('/lang/{lang}', 'LangController@index')->name('langUrl');

    Route::get('/', 'SiteController@index')->name('homepage');
    
    Route::get('/search', 'SiteController@search')->name('searchPage');

    // Route::get('/ttt', 'SiteController@test')->name('test');

    
    Route::get('xidmet-sebekesi', 'SiteController@branch')->name('branch');
    Route::get('service-network', 'SiteController@branch')->name('branch');
    Route::get('servisnaya-set', 'SiteController@branch')->name('branch');
    
    Route::get('about-us', 'SiteController@haqqimizda')->name('aboutus');
    Route::get('haqqimizda', 'SiteController@haqqimizda')->name('aboutus');
    Route::get('o-nas', 'SiteController@haqqimizda')->name('aboutus');


    Route::get('odenis-ve-catdirilma', 'SiteController@paymentdelivery')->name('paymentdelivery');
    Route::get('payment-and-delivery', 'SiteController@paymentdelivery')->name('paymentdelivery');
    Route::get('oplata-i-dostavka', 'SiteController@paymentdelivery')->name('paymentdelivery');

    Route::get('zemanet-sertleri', 'SiteController@zemanet')->name('zemanet');
    Route::get('warranty-terms', 'SiteController@zemanet')->name('zemanet');
    Route::get('usloviya-garantii', 'SiteController@zemanet')->name('zemanet');

    Route::get('aksiyalar-ve-xeberler', 'SiteController@news')->name('news');
    Route::get('promotions-and-news', 'SiteController@news')->name('news');
    Route::get('akcii-i-novosti', 'SiteController@news')->name('news');

    Route::get('aksiyalar-ve-xeberler/{slug}', 'SiteController@news_read')->name('news_read');
    Route::get('promotions-and-news/{slug}', 'SiteController@news_read')->name('news_read');
    Route::get('akcii-i-novosti/{slug}', 'SiteController@news_read')->name('news_read');

    Route::get('bizimle-elaqe', 'SiteController@contact')->name('contact');
    Route::get('contact-us', 'SiteController@contact')->name('contact');
    Route::get('svyazites-s-nami', 'SiteController@contact')->name('contact');

    Route::get('/product/{slug}', 'SiteController@product')->name('product');
    

    
    Route::get('/contact', 'SiteController@elaqe')->name('contact');

    

    
    Route::get('/delivery', 'SiteController@catdirilma')->name('delivery');

    Route::get('/sifarislerim', 'SiteController@sifarislerim')->name('sifarislerim');
    Route::get('/my-orders', 'SiteController@sifarislerim')->name('myOrders');
    Route::get('/moi-zakazy', 'SiteController@sifarislerim')->name('zakazy');

    Route::get('/istek-siyahisi', 'SiteController@wishlist')->name('secilmisler');
    Route::get('/wish-list', 'SiteController@wishlist')->name('wishlist');
    Route::get('/izbrannye', 'SiteController@wishlist')->name('izbrannye');
    Route::post('/wishadd', 'WishListController@store')->name('storeWish');
    Route::post('/wishremove', 'WishListController@destroy')->name('destroyWish');


    Route::get('/sebet', 'SiteController@sebet')->name('sebet');
    Route::get('/career', 'SiteController@career')->name('career');
    Route::get('/career/{slug}', 'SiteController@career_inner')->name('career_inner');
    Route::get('/basket', 'SiteController@sebet')->name('basket');
    Route::get('/korzino', 'SiteController@sebet')->name('korzino');
    Route::post('/sebetadd', 'BasketController@store')->name('storeBasket');
    Route::post('/sebetupdate', 'BasketController@update')->name('updateBasket');
    Route::post('/sebetremove', 'BasketController@destroy')->name('destroyBasket');

    Route::get('/sifaris', 'SiteController@sifaris')->name('sifaris');
    Route::get('/order', 'SiteController@sifaris')->name('order');
    Route::get('/zakaz', 'SiteController@sifaris')->name('zakaz');
    Route::post('/sifariset', 'OrderController@store')->name('sifarisEt');

    Route::get('/tekrar-sifaris-et/{id}', 'SiteController@tekrarSifaris')->name('tekrarSifarisEt');
    Route::get('/order-again/{id}', 'SiteController@tekrarSifaris')->name('orderAgain');
    Route::get('/zakazat-snova/{id}', 'SiteController@tekrarSifaris')->name('zakazatSnova');

    

    Route::get('/sifremi-unutdum', 'SiteController@forgetPass')->name('sifremiUnutdum');
    Route::get('/reset-password', 'SiteController@forgetPass')->name('forgetPass');
    Route::get('/sbros-parolya', 'SiteController@forgetPass')->name('sbrosParolya');
    Route::post('/sifreniyenile', 'CustomerController@forgot')->name('sendMailForgot');
    // Route::get('/confirm-code/{code}', 'SiteController@confirmPass')->name('confirmPass');
    Route::match(['get', 'post'], '/confirm-code/{code}','SiteController@confirmPass');

    Route::post('/order_store', 'OrderController@store')->name('storeOrder');


    Auth::routes();

    Route::get('/home', 'HomeController@index')->name('home');

    Route::get('{slug}', 'SiteController@category')->name('category');

});
