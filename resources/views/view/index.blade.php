@extends('layouts.dizayn')
@section('content')
   
<section id="home-banner">
    <div id="carouselExampleFade" class="carousel slide carousel-fade" data-bs-ride="carousel">
        <div class="carousel-inner">
            @foreach($sliders as $slider)
            <div class="carousel-item active" style="background: url({{asset('public/slider/'.$slider->img)}}) center no-repeat; background-size: cover">
                <!-- <img src="img/home-slider/bg-img.jpg" class="d-block w-100" alt=""> -->
                <div class="container">
                    <div class="banner-caption">
                        <h1>{{$slider->getSlider->where('lang',Session('lang'))->first()->title}}</h1>
                        <p>{!!$slider->getSlider->where('lang',Session('lang'))->first()->text!!}</p>
                        @if(!empty($slider->getSlider->where('lang',Session('lang'))->first()->link))
                        <a href="{{$slider->getSlider->where('lang',Session('lang'))->first()->link}}" class="btn-general primary">{{$slider->getSlider->where('lang',Session('lang'))->first()->button}} <img src="{{asset('sobsan/img/icon/icons-arrow-white.svg')}}" alt="arrow"></a>
                        @endif
                    </div>
                </div>
            </div>
            @endforeach
            
    </div>
    @if(isset($discount->id))
     <div id="discount-banner" class="container">
        <div class="banner-header">
            <div class="row">
                <div class="col-12 col-lg-6 d-flex align-items-center justify-content-center">
                    <div class="banner-left">
                        <h1>{{$discount->getCard->where('lang',Session('lang'))->first()->title}}</h1>
                        {!!$discount->getCard->where('lang',Session('lang'))->first()->text!!}
                        <div class="button-group">
                            @if(!empty($discount->getCard->where('lang',Session('lang'))->first()->order_link))
                            <a href="{{$discount->getCard->where('lang',Session('lang'))->first()->order_link}}" class="btn-general secondary"> Sifariş et<img src="{{asset('sobsan/img/icon/icons-arrow-red.svg')}}" alt=""></a>
                            @endif
                            @if(!empty($discount->getCard->where('lang',Session('lang'))->first()->more_link))
                            <a href="{{$discount->getCard->where('lang',Session('lang'))->first()->more_link}}" class="btn-general">Daha ətraflı</a>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="col-12 col-lg-6 d-flex align-items-center justify-content-end">
                    <div class="banner-right">
                        <img src="{{asset('public/Banner/'.$discount->img)}}" alt="{{$discount->getCard->where('lang',Session('lang'))->first()->title}}">
                    </div>
                </div>
            </div>
        </div>
        <div class="banner-footer">
            <div class="row">
                <div class="col-12 col-lg-6">
                    <div class="question-block">
                        <p>Peşəkar bir məsləhətçinin məsləhətinə ehtiyacınız var?</p>
                    </div>
                </div>
                <div class="col-6 col-lg-3">
                    <div class="phone-block">
                        <div class="block-img">
                            <img src="{{asset('sobsan/img/icon/icons-phone.svg')}}" alt="">
                        </div>
                        <a href="tel:055 313 33 33">055 313 33 33</a>
                    </div>
                </div>
                <div class="col-6 col-lg-3">
                    <div class="chat-block">
                        <div class="block-img">
                            <img src="{{asset('sobsan/img/icon/icons-question.svg')}}" alt="">
                        </div>
                        <a href="mailto:sobsan@info.com">Bizə yazın</a>
                    </div>
                </div>
            </div>
        </div>
    </div> 
    @endif
</section>
<section id="top-products">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h2 class="section-heading">Populyar məhsullar</h2>
            </div>
        </div>
        <div class="row">
            <div class="col-12 col-sm-6 col-lg-4 col-xl-3">
                <div class="product-cart">
                    <div class="cart-header">
                        <span class="pr-label primary">Yenİ</span>
                        <span class="pr-label secondary">Yenİ</span>
                    </div>
                    <div class="cart-body">
                        <a class="pr-img" href="product.html"><img src="{{asset('sobsan/img/product/product-1.png')}}" alt=""></a>
                        <div class="cart-info">
                            <div class="grid-list">
                                <span class="pr-brand">Sobsan</span>
                                <a href="product.html" class="pr-name">Sobplastik</a>
                            </div>
                            <div class="grid-list">
                                <p class="pr-desc">Akrilik kopolimer emulsiya əsaslı, fasad boyası</p>
                            </div>
                            <div class="grid-list">
                                <span class="pr-price">54.80 AZN</span>
                                <div class="pr-stock">
                                    <span class="stock-icon">&#10003;</span>
                                    <span>Anbarda: </span>
                                    <span class="stock-count">3</span>
                                    <span>ədəd</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="cart-footer">
                        <a class="btn-general add-cart" data-text="Səbətə at"><span>Səbətə at</span> <img src="img/icon/icons-add-to-cart.svg" alt=""> </a>
                        <div class="button-group">
                            <a class="btn-general compare" data-text="Müqayisə">
                                <img src="img/icon/icons-compare.svg" alt="">
                                <img class="compare-white" src="{{asset('sobsan/img/icon/icons-compare-white.svg')}}" alt="">
                                <span>Müqayisə</span>
                            </a>
                            <a class="btn-general add-favorite">
                                <img class="heart-stroked" src="{{asset('sobsan/img/icon/icons-favourite.svg')}}" alt="">
                                <img class="heart-filled" src="{{asset('sobsan/img/icon/icons-favourite-full.svg')}}" alt="">
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-sm-6 col-lg-4 col-xl-3">
                <div class="product-cart">
                    <div class="cart-header">
                        <span class="pr-label primary">Yenİ</span>
                        <span class="pr-label secondary">Yenİ</span>
                    </div>
                    <div class="cart-body">
                        <a class="pr-img" href="product.html"><img src="{{asset('sobsan/img/product/product-1.png')}}" alt=""></a>
                        <div class="cart-info">
                            <div class="grid-list">
                                <span class="pr-brand">Sobsan</span>
                                <a href="product.html" class="pr-name">Sobplastik</a>
                            </div>
                            <div class="grid-list">
                                <p class="pr-desc">Akrilik kopolimer emulsiya əsaslı, fasad boyası</p>
                            </div>
                            <div class="grid-list">
                                <span class="pr-price">54.80 AZN</span>
                                <div class="pr-stock">
                                    <span class="stock-icon">&#10003;</span>
                                    <span>Anbarda: </span>
                                    <span class="stock-count">3</span>
                                    <span>ədəd</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="cart-footer">
                        <a class="btn-general add-cart" data-text="Səbətə at"><span>Səbətə at</span> <img src="{{asset('sobsan/img/icon/icons-add-to-cart.svg')}}" alt=""> </a>
                        <div class="button-group">
                            <a class="btn-general compare" data-text="Müqayisə">
                                <img src="{{asset('sobsan/img/icon/icons-compare.svg')}}" alt="">
                                <img class="compare-white" src="{{asset('sobsan/img/icon/icons-compare-white.svg')}}" alt="">
                                <span>Müqayisə</span>
                            </a>
                            <a class="btn-general add-favorite">
                                <img class="heart-stroked" src="{{asset('sobsan/img/icon/icons-favourite.svg')}}" alt="">
                                <img class="heart-filled" src="{{asset('sobsan/img/icon/icons-favourite-full.svg')}}" alt="">
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-sm-6 col-lg-4 col-xl-3">
                <div class="product-cart">
                    <div class="cart-header">
                        <span class="pr-label primary">Yenİ</span>
                        <span class="pr-label secondary">Yenİ</span>
                    </div>
                    <div class="cart-body">
                        <a class="pr-img" href="product.html"><img src="{{asset('sobsan/img/product/product-1.png')}}" alt=""></a>
                        <div class="cart-info">
                            <div class="grid-list">
                                <span class="pr-brand">Sobsan</span>
                                <a href="product.html" class="pr-name">Sobplastik</a>
                            </div>
                            <div class="grid-list">
                                <p class="pr-desc">Akrilik kopolimer emulsiya əsaslı, fasad boyası</p>
                            </div>
                            <div class="grid-list">
                                <span class="pr-price">54.80 AZN</span>
                                <div class="pr-stock">
                                    <span class="stock-icon">&#10003;</span>
                                    <span>Anbarda: </span>
                                    <span class="stock-count">3</span>
                                    <span>ədəd</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="cart-footer">
                        <a class="btn-general add-cart" data-text="Səbətə at"><span>Səbətə at</span> <img src="img/icon/icons-add-to-cart.svg" alt=""> </a>
                        <div class="button-group">
                            <a class="btn-general compare" data-text="Müqayisə">
                                <img src="img/icon/icons-compare.svg" alt="">
                                <img class="compare-white" src="{{asset('sobsan/img/icon/icons-compare-white.svg')}}" alt="">
                                <span>Müqayisə</span>
                            </a>
                            <a class="btn-general add-favorite">
                                <img class="heart-stroked" src="{{asset('sobsan/img/icon/icons-favourite.svg')}}" alt="">
                                <img class="heart-filled" src="{{asset('sobsan/img/icon/icons-favourite-full.svg')}}" alt="">
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-sm-6 col-lg-4 col-xl-3">
                <div class="product-cart">
                    <div class="cart-header">
                        <span class="pr-label primary">Yenİ</span>
                        <span class="pr-label secondary">Yenİ</span>
                    </div>
                    <div class="cart-body">
                        <a class="pr-img" href="product.html"><img src="{{asset('sobsan/img/product/product-1.png')}}" alt=""></a>
                        <div class="cart-info">
                            <div class="grid-list">
                                <span class="pr-brand">Sobsan</span>
                                <a href="product.html" class="pr-name">Sobplastik</a>
                            </div>
                            <div class="grid-list">
                                <p class="pr-desc">Akrilik kopolimer emulsiya əsaslı, fasad boyası</p>
                            </div>
                            <div class="grid-list">
                                <span class="pr-price">54.80 AZN</span>
                                <div class="pr-stock">
                                    <span class="stock-icon">&#10003;</span>
                                    <span>Anbarda: </span>
                                    <span class="stock-count">3</span>
                                    <span>ədəd</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="cart-footer">
                        <a class="btn-general add-cart" data-text="Səbətə at"><span>Səbətə at</span> <img src="img/icon/icons-add-to-cart.svg" alt=""> </a>
                        <div class="button-group">
                            <a class="btn-general compare" data-text="Müqayisə">
                                <img src="{{asset('sobsan/img/icon/icons-compare.svg')}}" alt="">
                                <img class="compare-white" src="{{asset('sobsan/img/icon/icons-compare-white.svg')}}" alt="">
                                <span>Müqayisə</span>
                            </a>
                            <a class="btn-general add-favorite">
                                <img class="heart-stroked" src="{{asset('sobsan/img/icon/icons-favourite.svg')}}" alt="">
                                <img class="heart-filled" src="{{asset('sobsan/img/icon/icons-favourite-full.svg')}}" alt="">
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-sm-6 col-lg-4 col-xl-3">
                <div class="product-cart">
                    <div class="cart-header">
                        <span class="pr-label primary">Yenİ</span>
                        <span class="pr-label secondary">Yenİ</span>
                    </div>
                    <div class="cart-body">
                        <a class="pr-img" href="product.html"><img src="{{asset('sobsan/img/product/product-1.png')}}" alt=""></a>
                        <div class="cart-info">
                            <div class="grid-list">
                                <span class="pr-brand">Sobsan</span>
                                <a href="product.html" class="pr-name">Sobplastik</a>
                            </div>
                            <div class="grid-list">
                                <p class="pr-desc">Akrilik kopolimer emulsiya əsaslı, fasad boyası</p>
                            </div>
                            <div class="grid-list">
                                <span class="pr-price">54.80 AZN</span>
                                <div class="pr-stock">
                                    <span class="stock-icon">&#10003;</span>
                                    <span>Anbarda: </span>
                                    <span class="stock-count">3</span>
                                    <span>ədəd</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="cart-footer">
                        <a class="btn-general add-cart" data-text="Səbətə at"><span>Səbətə at</span> <img src="img/icon/icons-add-to-cart.svg" alt=""> </a>
                        <div class="button-group">
                            <a class="btn-general compare" data-text="Müqayisə">
                                <img src="{{asset('sobsan/img/icon/icons-compare.svg')}}" alt="">
                                <img class="compare-white" src="{{asset('sobsan/img/icon/icons-compare-white.svg')}}" alt="">
                                <span>Müqayisə</span>
                            </a>
                            <a class="btn-general add-favorite">
                                <img class="heart-stroked" src="{{asset('sobsan/img/icon/icons-favourite.svg')}}" alt="">
                                <img class="heart-filled" src="{{asset('sobsan/img/icon/icons-favourite-full.svg')}}" alt="">
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-sm-6 col-lg-4 col-xl-3">
                <div class="product-cart">
                    <div class="cart-header">
                        <span class="pr-label primary">Yenİ</span>
                        <span class="pr-label secondary">Yenİ</span>
                    </div>
                    <div class="cart-body">
                        <a class="pr-img" href="product.html"><img src="{{asset('sobsan/img/product/product-1.png')}}" alt=""></a>
                        <div class="cart-info">
                            <div class="grid-list">
                                <span class="pr-brand">Sobsan</span>
                                <a href="product.html" class="pr-name">Sobplastik</a>
                            </div>
                            <div class="grid-list">
                                <p class="pr-desc">Akrilik kopolimer emulsiya əsaslı, fasad boyası</p>
                            </div>
                            <div class="grid-list">
                                <span class="pr-price">54.80 AZN</span>
                                <div class="pr-stock">
                                    <span class="stock-icon">&#10003;</span>
                                    <span>Anbarda: </span>
                                    <span class="stock-count">3</span>
                                    <span>ədəd</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="cart-footer">
                        <a class="btn-general add-cart" data-text="Səbətə at"><span>Səbətə at</span> <img src="{{asset('sobsan/img/icon/icons-add-to-cart.svg')}}" alt=""> </a>
                        <div class="button-group">
                            <a class="btn-general compare" data-text="Müqayisə">
                                <img src="{{asset('sobsan/img/icon/icons-compare.svg')}}" alt="">
                                <img class="compare-white" src="{{asset('sobsan/img/icon/icons-compare-white.svgimg/icon/icons-compare-white.svg')}}" alt="">
                                <span>Müqayisə</span>
                            </a>
                            <a class="btn-general add-favorite">
                                <img class="heart-stroked" src="{{asset('sobsan/img/icon/icons-favourite.svg')}}" alt="">
                                <img class="heart-filled" src="{{asset('sobsan/img/icon/icons-favourite-full.svg')}}" alt="">
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-sm-6 col-lg-4 col-xl-3">
                <div class="product-cart">
                    <div class="cart-header">
                        <span class="pr-label primary">Yenİ</span>
                        <span class="pr-label secondary">Yenİ</span>
                    </div>
                    <div class="cart-body">
                        <a class="pr-img" href="product.html"><img src="{{asset('sobsan/img/product/product-1.png')}}" alt=""></a>
                        <div class="cart-info">
                            <div class="grid-list">
                                <span class="pr-brand">Sobsan</span>
                                <a href="product.html" class="pr-name">Sobplastik</a>
                            </div>
                            <div class="grid-list">
                                <p class="pr-desc">Akrilik kopolimer emulsiya əsaslı, fasad boyası</p>
                            </div>
                            <div class="grid-list">
                                <span class="pr-price">54.80 AZN</span>
                                <div class="pr-stock">
                                    <span class="stock-icon">&#10003;</span>
                                    <span>Anbarda: </span>
                                    <span class="stock-count">3</span>
                                    <span>ədəd</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="cart-footer">
                        <a class="btn-general add-cart" data-text="Səbətə at"><span>Səbətə at</span> <img src="img/icon/icons-add-to-cart.svg" alt=""> </a>
                        <div class="button-group">
                            <a class="btn-general compare" data-text="Müqayisə">
                                <img src="{{asset('sobsan/img/icon/icons-compare.svg')}}" alt="">
                                <img class="compare-white" src="{{asset('sobsan/img/icon/icons-compare-white.svg')}}" alt="">
                                <span>Müqayisə</span>
                            </a>
                            <a class="btn-general add-favorite">
                                <img class="heart-stroked" src="{{asset('sobsan/img/icon/icons-favourite.svg')}}" alt="">
                                <img class="heart-filled" src="{{asset('sobsan/img/icon/icons-favourite-full.svg')}}" alt="">
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-sm-6 col-lg-4 col-xl-3">
                <div class="product-cart">
                    <div class="cart-header">
                        <span class="pr-label primary">Yenİ</span>
                        <span class="pr-label secondary">Yenİ</span>
                    </div>
                    <div class="cart-body">
                        <a class="pr-img" href="product.html"><img src="{{asset('sobsan/img/product/product-1.png')}}" alt=""></a>
                        <div class="cart-info">
                            <div class="grid-list">
                                <span class="pr-brand">Sobsan</span>
                                <a href="product.html" class="pr-name">Sobplastik</a>
                            </div>
                            <div class="grid-list">
                                <p class="pr-desc">Akrilik kopolimer emulsiya əsaslı, fasad boyası</p>
                            </div>
                            <div class="grid-list">
                                <span class="pr-price">54.80 AZN</span>
                                <div class="pr-stock">
                                    <span class="stock-icon">&#10003;</span>
                                    <span>Anbarda: </span>
                                    <span class="stock-count">3</span>
                                    <span>ədəd</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="cart-footer">
                        <a class="btn-general add-cart" data-text="Səbətə at"><span>Səbətə at</span> <img src="{{asset('sobsan/img/icon/icons-add-to-cart.svg')}}" alt=""> </a>
                        <div class="button-group">
                            <a class="btn-general compare" data-text="Müqayisə">
                                <img src="{{asset('sobsan/img/icon/icons-compare.svg')}}" alt="">
                                <img class="compare-white" src="{{asset('sobsan/img/icon/icons-compare-white.svg')}}" alt="">
                                <span>Müqayisə</span>
                            </a>
                            <a class="btn-general add-favorite">
                                <img class="heart-stroked" src="{{asset('sobsan/img/icon/icons-favourite.svg')}}" alt="">
                                <img class="heart-filled" src="{{asset('sobsan/img/icon/icons-favourite-full.svg')}}" alt="">
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section id="offers">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h2 class="section-heading">Daxili rəngləmə təklifləri</h2>
            </div>
        </div>
        
        @for($t=3; $t<= count($banners);$t+=3)
        @if($t%2 == 1)
        <div class="row offer-row">
            
            @foreach($banners as $k=>$banner)
            @if($k<=2)
            <div class="col-12 col-lg-4 @if($k == 0)col-xl-6 @else col-xl-3 col-md-6 @endif">
                <div class="offer-box">
                    <a href="@if(Session('lang') == 'az') {{url('suggestions/'.$banner->getBanner->where('lang',Session('lang'))->first()->slug)}} @else {{url(Session('lang').'/suggestions/'.$banner->getBanner->where('lang',Session('lang'))->first()->slug)}} @endif" class="box-img">
                        <img src="{{asset('sobsan/img/offer/qonaq-otagi.png')}}" alt="{{$banner->getBanner->where('lang',Session('lang'))->first()->title}}">
                        <div class="overlay">

                            <p>{{$banner->getBanner->where('lang',Session('lang'))->first()->title}}</p>
                            }
                        </div>
                    </a>
                    <div class="box-text">
                        <p class="offer-desc">Daxili rəngləmə təklifləri</p>
                        <a href="@if(Session('lang') == 'az') {{url('suggestions/'.$banner->getBanner->where('lang',Session('lang'))->first()->slug)}} @else {{url(Session('lang').'/suggestions/'.$banner->getBanner->where('lang',Session('lang'))->first()->slug)}} @endif">
                            <h3 class="offer-name">{{$banner->getBanner->where('lang',Session('lang'))->first()->title}}</h3>
                        </a>
                    </div>
                </div>
            </div>
            @endif
            @endforeach
            
        </div>
        @else

        <div class="row offer-row">
            @foreach($banners as $k=>$banner)
            @if($k>2)
            @if($k==5)
            <div class="col-12 col-lg-4 col-xl-6">
                <div class="offer-box">
                    <a href="@if(Session('lang') == 'az') {{url('suggestions/'.$banner->getBanner->where('lang',Session('lang'))->first()->slug)}} @else {{url(Session('lang').'/suggestions/'.$banner->getBanner->where('lang',Session('lang'))->first()->slug)}} @endif" class="box-img">
                        <img src="{{asset('sobsan/img/offer/metbex.png')}}" alt="">
                        <div class="overlay">
                            <p>{{$banner->getBanner->where('lang',Session('lang'))->first()->title}}</p>
                        </div>
                    </a>
                    <div class="box-text">
                        <p class="offer-desc">Daxili rəngləmə təklifləri</p>
                        <a href="@if(Session('lang') == 'az') {{url('suggestions/'.$banner->getBanner->where('lang',Session('lang'))->first()->slug)}} @else {{url(Session('lang').'/suggestions/'.$banner->getBanner->where('lang',Session('lang'))->first()->slug)}} @endif">
                            <h3 class="offer-name">{{$banner->getBanner->where('lang',Session('lang'))->first()->title}}</h3>
                        </a>
                    </div>
                </div>
            </div>
            @else
            <div class="col-12 col-md-6 col-lg-4 col-xl-3">
                <div class="offer-box">
                    <a href="@if(Session('lang') == 'az') {{url('suggestions/'.$banner->getBanner->where('lang',Session('lang'))->first()->slug)}} @else {{url(Session('lang').'/suggestions/'.$banner->getBanner->where('lang',Session('lang'))->first()->slug)}} @endif" class="box-img">
                        <img src="{{asset('sobsan/img/offer/dehliz.png')}}" alt="{{$banner->getBanner->where('lang',Session('lang'))->first()->title}}">
                        <div class="overlay">
                            <p>{{$banner->getBanner->where('lang',Session('lang'))->first()->title}}</p>
                        </div>
                    </a>
                    <div class="box-text">
                        <p class="offer-desc">Daxili rəngləmə təklifləri</p>
                        <a href="@if(Session('lang') == 'az') {{url('suggestions/'.$banner->getBanner->where('lang',Session('lang'))->first()->slug)}} @else {{url(Session('lang').'/suggestions/'.$banner->getBanner->where('lang',Session('lang'))->first()->slug)}} @endif">
                            <h3 class="offer-name">{{$banner->getBanner->where('lang',Session('lang'))->first()->title}}</h3>
                        </a>
                    </div>
                </div>
            </div>
            @endif
            @endif
            @endforeach
            
            
        </div>
        @endif
        @endfor
        
        
        
    </div>
</section>
<section id="deals">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h2 class="section-heading">Aksiyalar</h2>
            </div>
        </div>
        <div class="owl-carousel owl-theme">
            @foreach($news as $new)
            <div class="deal-box">
                <a href="@if(Session('lang') == 'az') {{url('aksiyalar-ve-xeberler/'.$new->getActions->where('lang',Session('lang'))->first()->slug)}}@elseif(Session('lang') == 'en'){{url(Session('lang').'/promotions-and-news/'.$new->getActions->where('lang',Session('lang'))->first()->slug)}} @elseif(Session('lang') == 'ru'){{url(Session('lang').'/akcii-i-novosti/'.$new->getActions->where('lang',Session('lang'))->first()->slug)}} @endif" class="box-img">
                    <img src="{{asset('public/actions/'.$new->img)}}" alt="{{$new->getActions->where('lang',Session('lang'))->first()->title}}">
                </a>
                <div class="box-text">
                    <a href="@if(Session('lang') == 'az') {{url('aksiyalar-ve-xeberler/'.$new->getActions->where('lang',Session('lang'))->first()->slug)}}@elseif(Session('lang') == 'en'){{url(Session('lang').'/promotions-and-news/'.$new->getActions->where('lang',Session('lang'))->first()->slug)}} @elseif(Session('lang') == 'ru'){{url(Session('lang').'/akcii-i-novosti/'.$new->getActions->where('lang',Session('lang'))->first()->slug)}} @endif">
                        <h3 class="deal-name">{{$new->getActions->where('lang',Session('lang'))->first()->title}}</h3>
                    </a>
                    <p class="deal-desc">{!!substr( $new->getActions->where('lang',Session('lang'))->first()->description,0,150) !!}</p>
                </div>
            </div>
            @endforeach
            
        </div>
    </div>
</section>
<section id="videos">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h2 class="section-heading">Videolar</h2>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6">
                <div class="video-left">
                    <h3 class="video-name">{{$home->video_title}}</h3>
                    {!! $home->video_text !!}
                </div>
            </div>
            <div class="col-lg-6">
                <div class="video-right">
                    <div class="video-box large">
                        <img src="{{asset('public/Gallery/'.$important_video->thumbnail)}}" alt="@if(Session('lang') == 'az') {{$important_video->title_az}} @elseif(Session('lang') == 'en') {{$important_video->title_en}} @elseif(Session('lang') == 'ru') {{$important_video->title_ru}} @endif">
                        <div class="overlay">
                            <a data-fancybox="gallery" href="{{$important_video->path}}">
                                <img src="{{asset('sobsan/img/icon/icons-video-play.svg')}}" alt="">
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="owl-carousel owl-theme">
            @foreach($videos as $video)
            <div class="video-box small">
                <img src="{{asset('public/Gallery/'.$video->thumbnail)}}" alt="@if(Session('lang') == 'az') {{$video->title_az}} @elseif(Session('lang') == 'en') {{$video->title_en}} @elseif(Session('lang') == 'ru') {{$video->title_ru}} @endif">
                <div class="overlay">
                    <a data-fancybox="gallery" href="{{$video->path}}">
                        <img src="{{asset('sobsan/img/icon/icons-video-play.svg')}}" alt="@if(Session('lang') == 'az') {{$video->title_az}} @elseif(Session('lang') == 'en') {{$video->title_en}} @elseif(Session('lang') == 'ru') {{$video->title_ru}} @endif">
                    </a>
                </div>
            </div>
            @endforeach
            
        </div>
    </div>
</section>

@section('additionalJs')
    <script>
        function addToCart($pr) {
            $.ajax({
                url: "{{route('storeBasket',['locale'=>Session('lang')])}}",
                type: 'POST',
                data: {
                    '_token': "{{ csrf_token() }}",
                    'pr_id': $pr,
                    'quantity': 1,
                },
                success: function (response) {
                    if (response == 'yox') {
                        $oldQty = $('.qtyCount').text();
                        $('.qtyCount').text(parseInt($oldQty) + 1)
                        $('.qtyCount0').text(parseInt($('.qtyCount0').text()) + 1)
                        $('.qtyCount1').text(parseInt($('.qtyCount1').text()) + 1)
                    }
                    $('.addToCartResponse').css("display", "flex").fadeOut(4000);
                }
            });
        }

        function addToWish($pr,t) {
            $.ajax({
                url: "{{route('storeWish',['locale'=>Session('lang')])}}",
                type: 'POST',
                data: {
                    '_token': "{{ csrf_token() }}",
                    'pr_id': $pr,
                },
                success: function (response) {
                    if (response == 'yox') {
                        $oldQty = $('.wishCount').text();
                        $('.wishCount').html(parseInt($oldQty) + 1);
                        $('.wishCount0').html(parseInt($('.wishCount0').text()) + 1);
                        $('.wishCount1').html(parseInt($('.wishCount1').text()) + 1);
                    }
                }
            });
        }

        function removeFromWish($pr) {
            $.ajax({
                url: "{{route('destroyWish',['locale'=>Session('lang')])}}",
                type: 'POST',
                data: {
                    '_token': "{{ csrf_token() }}",
                    'pr_id': $pr,
                },
                success: function (response) {
                    if (response.ok == 'ok') {
                        $oldQty = $('.wishCount').text();
                        $('.wishCount').html(parseInt($oldQty) - 1)
                        $('.wishCount0').html(parseInt($('.wishCount0').text()) - 1);
                        $('.wishCount1').html(parseInt($('.wishCount1').text()) - 1);
                    }
                }
            });
        }
    </script>
@endsection
