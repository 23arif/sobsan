<!DOCTYPE html>
</html>
<html lang="en">
<head>
    <!-- Important Meta Tags -->
    <meta charset="UTF-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <meta name="Description" content=""/>

    <!-- Title -->
    <title>Lucky</title>

    <!-- Google fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com"/>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600&display=swap"
          rel="stylesheet"/>

    <!-- Font awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css"
          integrity="sha512-5A8nwdMOWrSz20fDsjczgUidUBR8liPYU+WymTZP1lmY9G6Oc7HlZv156XqnsgNUzTyMefFTcsFH/tnJE/+xBg=="
          crossorigin="anonymous"/>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous"/>

    <!-- Owl carousel -->
    <link rel="stylesheet" href="{{asset('/lucky/css/carousel.min.css')}}"/>
    <link rel="stylesheet" href="{{asset('/lucky/css/owl.theme.default.min.css')}}"/>

    <!-- Custom style -->
    <link rel="stylesheet" href="{{asset('/lucky/css/style.css')}}?v=1.1"/>

    <!-- Responsive style -->
    <link rel="stylesheet" href="{{asset('/lucky/css/responsive.css')}}?v=1.2"/>
</head>
<body class="body-home">
<style>
    .error404 {
        display: flex;
        justify-content: center;
        align-items: center;
        flex-direction: column;
        margin-top: 50px;
    }

    .errornumb {
        color: #fc8410;
        font-size: 100px;
        font-weight: bold;
    }

    .error404 p {
        font-size: 20px;
    }
</style>
<!-- Header -->
<header id="header-general">
    <!-- Header top -->
    <div class="header-top">
        <div class="container">
            <div class="row">
                <div class="header-social">

                </div>
            </div>
        </div>
    </div>

    <!-- Header middle -->
    <div class="header-middle">
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-3 col-lg-3">
                    <div class="header-logo">
                        <a href="{{route('homepage',['locale'=>'az'])}}"><img
                                src="{{asset('/lucky/images/logo/logo-header.svg')}}"
                                alt="lucky logo"/></a>
                    </div>
                </div>
                <div class="xs-md-hidden col-md-6 col-lg-6 d-flex align-items-center">
                    <form id="header-search-form" action="{{route('searchPage',['locale'=>'az'])}}"
                          method="get">
                        <div class="search-box">
                            <input type="text" class="form-control" name="search" id="header-search"
                                   placeholder="{{__('esas.axtar')}}"/>
                            <span class="search-icon" onclick="$('#header-search-form').submit()"
                                  style="cursor: pointer"><i class="fa fa-search" aria-hidden="true"></i></span>
                        </div>
                    </form>
                </div>
                <div class="col-4 md-hidden">
                    <div class="menu-toggle">
                        <div class="bar">
                            <div class="one"></div>
                            <div class="two"></div>
                            <div class="three"></div>
                        </div>
                    </div>
                </div>
                <div class="col-8 md-hidden d-flex align-items-center justify-content-end">

                </div>
            </div>
        </div>

        <!-- Mobile nav -->
        <nav class="mobile-nav md-hidden">
            <form  action="{{route('searchPage',['locale'=>'az'])}}"
                          method="get">
            <div class="mobile-search-box">
                <input type="text" class="form-control" name="search" id="mobile-header-search"
                       placeholder="{{__('esas.axtar')}}"/>
                <span class="search-icon" onclick="$('#header-search-form').submit()"><i class="fa fa-search" aria-hidden="true"></i></span>
            </div>
            </form>

            <div class="mobile-nav-wrapper">
                <ul class="mobile-nav-list">
                    <li class="nav-item"><a href="{{route(__('esas.yeniRoute'),['locale'=>'az'])}}"
                                            class="nav-link">{{__('esas.yeniT')}}</a></li>
                    <li class="nav-item"><a href="{{route(__('esas.endirimRoute'),['locale'=>'az'])}}"
                                            class="nav-link">{{__('esas.endirimT')}}</a></li>
                    <li class="nav-item"><a href="{{route(__('esas.bestRoute'),['locale'=>'az'])}}"
                                            class="nav-link">{{__('esas.bestT')}}</a></li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">{{__('esas.sertlerT')}}</a>
                        <img class="mobile-nav-item-arrow" src="{{asset('/lucky/images/icon/arrow-right.svg')}}"
                             alt=""/>
                    </li>
                    <ul class="mobile-nav-dropdown">
                        <li class="mobile-nav-item"><a
                                href="{{route(__('esas.catdirilmaRoute'),['locale'=>'az'])}}">{{__('esas.catdirilmaT')}}</a>
                        </li>
                        <li class="mobile-nav-item"><a
                                href="{{route(__('esas.qaytarilmaRoute'),['locale'=>'az'])}}">{{__('esas.qaytarilmaT')}}</a>
                        </li>
                    </ul>
                </ul>
            </div>
        </nav>
    </div>

    <!-- Header bottom -->
    <div class="header-bottom">
        <div class="container">
            <div class="row">
                <!-- Category -->
                <div class="col-md-4 xs-md-hidden">
                    <div class="category">
                        <ul class="category-list">
                            <div class="category-head">
                                <li class="category-heading"><img src="{{asset('/lucky/images/icon/category.svg')}}"
                                                                  alt=""/>{{__('esas.kateqoriyalar')}}
                                </li>
                            </div>

                            <div class="category-body">
                                <ul class="category-body-list">
                                    @foreach($cats as $cat)
                                        <li class="category-list-item">
                                            <a href="{{url('az'.'/'.$cat->getCat->where('lang',Lang::getLocale())->first()->slug)}}"><img
                                                    src="{{asset('/lucky/images/icon/category-01-dark.svg')}}"
                                                    alt="Ofis ləvazimatları"/>{{$cat->getCat->where('lang',Lang::getLocale())->first()->name}}
                                            </a>
                                            <img class="category-item-arrow"
                                                 src="{{asset('/lucky/images/icon/arrow-right.svg')}}" alt=""/>
                                        </li>
                                        @if(isset($cat->children[0]))
                                            <ul class="category-list-dropdown">
                                                <div class="dropdown-container">
                                                    @foreach($cat->children as $c)
                                                        <li class="category-dropdown-item">
                                                            <a class="category-dropdown-heading"
                                                               href="{{url('az'.'/'.$c->getCat->where('lang',Lang::getLocale())->first()->slug)}}">{{$c->getCat->where('lang',Lang::getLocale())->first()->name}}</a>
                                                            @if(isset($c->children[0]))
                                                                <ul class="sub-dropdown-list">
                                                                    @foreach($c->children as $subchild)
                                                                        <li class="sub-dropdown-item">
                                                                            <a class="sub-dropdown-link"
                                                                               href="{{url('az'.'/'.$subchild->getCat->where('lang',Lang::getLocale())->first()->slug)}}">{{$subchild->getCat->where('lang',Lang::getLocale())->first()->name}}</a>
                                                                        </li>
                                                                    @endforeach
                                                                </ul>
                                                            @endif
                                                        </li>
                                                    @endforeach
                                                </div>
                                            </ul>
                                        @endif
                                    @endforeach
                                </ul>
                            </div>
                        </ul>
                    </div>
                </div>

                <!-- Nav -->
                <div class="col-md-8 xs-md-hidden">
                    <nav class="nav">
                        <ul class="xs-md-hidden">
                            <div class="nav-item-container">
                                <li class="nav-item"><a
                                        href="{{route(__('esas.yeniRoute'),['locale'=>'az'])}}"
                                        class="nav-link">{{__('esas.yeniT')}}</a></li>
                            </div>
                            <div class="nav-item-container">
                                <li class="nav-item"><a
                                        href="{{route(__('esas.endirimRoute'),['locale'=>'az'])}}"
                                        class="nav-link">{{__('esas.endirimT')}}</a></li>
                            </div>
                            <div class="nav-item-container">
                                <li class="nav-item"><a
                                        href="{{route(__('esas.bestRoute'),['locale'=>'az'])}}"
                                        class="nav-link">{{__('esas.bestT')}}</a></li>
                            </div>
                            <div class="nav-item-container">
                                <li class="nav-item">
                                    <a href="#" class="nav-link">{{__('esas.sertlerT')}}</a>
                                    <img class="nav-item-arrow" src="{{asset('sobsan')}}"
                                         alt=""/>
                                </li>
                                <ul class="nav-dropdown">
                                    <li class="nav-item"><a
                                            href="{{route(__('esas.catdirilmaRoute'),['locale'=>'az'])}}">{{__('esas.catdirilmaT')}}</a>
                                    </li>
                                    <li class="nav-item"><a
                                            href="{{route(__('esas.qaytarilmaRoute'),['locale'=>'az'])}}">{{__('esas.qaytarilmaT')}}</a>
                                    </li>
                                </ul>
                            </div>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
        <!-- Mobile Category -->
        <div class="mobile-category md-hidden">
            <ul class="mobile-category-list">
                <div class="mobile-category-head">
                    <li class="mobile-category-heading">
                        <a href="#"><img class="category-logo" src="{{asset('/lucky/images/icon/category.svg')}}"
                                         alt=""/>{{__('esas.kateqoriyalar')}} </a>
                    </li>
                </div>

                <div class="mobile-category-body">
                    <div class="category-item-container">
                        @foreach($cats as $cat)
                            <li class="mobile-category-list-item">
                                <a href="{{url(Session('lang').'/'.$cat->getCat->where('lang',Lang::getLocale())->first()->slug)}}">
                                    {{$cat->getCat->where('lang',Lang::getLocale())->first()->name}}
                                </a>
                                @if(isset($cat->children[0]))
                                    <img class="category-item-arrow"
                                         src="{{asset('/lucky/images/icon/arrow-right.svg')}}"
                                         alt=""/>
                                @endif
                            </li>
                            @if(isset($cat->children[0]))
                                <ul class="mobile-category-list-dropdown">
                                    <div class="category-item-container">
                                        @foreach($cat->children as $c)
                                            <li class="mobile-category-list-item">
                                                <a href="{{url(Session('lang').'/'.$c->getCat->where('lang',Lang::getLocale())->first()->slug)}}">{{$c->getCat->where('lang',Lang::getLocale())->first()->name}}</a>
                                                @if(isset($c->children[0]))
                                                <img class="category-item-arrow"
                                                     src="{{asset('/lucky/images/icon/arrow-right.svg')}}" alt=""/>
                                                @endif
                                            </li>
                                            @if(isset($c->children[0]))
                                                <ul class="mobile-category-list-dropdown">
                                                    @foreach($c->children as $subchild)
                                                        <li class="mobile-category-list-item">
                                                            <a href="{{url(Session('lang').'/'.$subchild->getCat->where('lang',Lang::getLocale())->first()->slug)}}">{{$subchild->getCat->where('lang',Lang::getLocale())->first()->name}}</a>
                                                        </li>
                                                    @endforeach
                                                </ul>
                                            @endif
                                        @endforeach
                                    </div>
                                </ul>
                            @endif
                        @endforeach
                    </div>
                </div>
            </ul>
        </div>
    </div>
</header>
<div class="error404">
    <h1 class="errornumb">404</h1>
    <p>Səhifə tapılmadı !</p>
</div>
<footer id="footer-general">
    <div class="container">
        <div class="row">
            <div class="col-12 col-lg-3 custom-flex-logo d-flex flex-column align-items-start justify-content-center">
                <div class="footer-logo">
                    <a href="{{route('homepage',['locale'=>'az'])}}"><img src="{{asset('/lucky/images/logo/logo-footer.svg')}}"
                                              alt="Lucky office support"/></a>
                </div>
                <div class="footer-social d-flex justify-content-center">
                    <ul class="social-list">
                        @if(!empty($settings->facebook))
                            <li class="social-item">
                                <a href="{{$settings->facebook}}" title="facebook" class="social-link"><i
                                        class="fa fa-facebook"
                                        aria-hidden="true"></i></a>
                            </li>
                        @endif
                        @if(!empty($settings->instagram))
                            <li class="social-item">
                                <a href="{{$settings->instagram}}" title="instagram" class="social-link"><i
                                        class="fa fa-instagram"
                                        aria-hidden="true"></i></a>
                            </li>
                        @endif
                        @if(!empty($settings->youtube))
                            <li class="social-item">
                                <a href="{{$settings->youtube}}" title="youtube" class="social-link"><i
                                        class="fa fa-youtube-play"
                                        aria-hidden="true"></i></a>
                            </li>
                        @endif
                    </ul>
                </div>
            </div>
            <div class="col-12 col-lg-3 d-flex align-items-center justify-content-between footer-center">
                <ul class="footer-main-cats">
                    <p class="footer-main-title">{{__('esas.kateqoriyalar')}}</p>
                    @foreach($cats as $cat)
                        <li class="">
                            <a href="{{url('az/'.$cat->getCat->where('lang',Lang::getLocale())->first()->slug)}}">
                                {{$cat->getCat->where('lang',Lang::getLocale())->first()->name}}
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>
            <div class="col-12 col-lg-3 d-flex align-items-center justify-content-between footer-center">
                <ul class="footer-main-menues">
                    <p class="footer-main-title">Menyular</p>
                    <li><a href="{{route(__('esas.haqqimizdaRoute'),['locale'=>'az'])}}">{{__('esas.haqqimizdaT')}}</a></li>
                    <li><a href="{{route(__('esas.catdirilmaRoute'),['locale'=>'az'])}}">{{__('esas.catdirilmaT')}}</a></li>
                    <li><a href="{{route(__('esas.qaytarilmaRoute'),['locale'=>'az'])}}">{{__('esas.qaytarilmaT')}}</a></li>
                    <li><a href="{{route(__('esas.elaqeRoute'),['locale'=>'az'])}}">{{__('esas.elaqeT')}}     </a></li>
                </ul>
            </div>
           <div class="col-12 col-lg-3 custom-flex-info d-flex align-items-start justify-content-end">
                <div class="footer-info d-flex flex-column align-items-start">
                    <p class="footer-main-title">Əlaqə</p>
                    <p><span>{{__('esas.tel')}}:</span>{{$settings->nomre}}</p>
                    <p><span>{{__('esas.email')}}:</span>{{$settings->email}}</p>
                    <p><span>{{__('esas.unvan')}}:</span>{{$settings->adress}}</p>
                </div>
            </div>
            <hr/>
           <div class="col-12 text-center">
                <div class="row">
                    <p class="footer-copyright col-12 col-md-6">© Bütün huquqlar qorunur - <a href="">Lucky Office Support</a></p>
                    <p class="footer-copyright col-12 col-md-6 d-flex justify-content-md-end justify-content-center">
                        Powered by
                        <a href="https://proton.az/" title="proton.az"
                           target="_blanked">&nbsp; Proton.az</a>
                    </p>
                </div>
            </div>
        </div>
    </div>
</footer>

<!-- jQuery -->
<script src="https://code.jquery.com/jquery-2.2.3.min.js"
        integrity="sha256-a23g1Nt4dtEYOj7bR+vTu7+T8VP13humZFBJNIYoEJo=" crossorigin="anonymous"></script>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW"
        crossorigin="anonymous"></script>

<!-- Owl carousel -->
<script src="{{asset('/lucky/js/carousel.min.js')}}"></script>

<!-- Product ArticleGallery -->
<script src="{{asset('/lucky/js/zoom-image.js')}}"></script>

<!-- My cart -->
<script src="{{asset('/lucky/js/jquery.mycart.js')}}"></script>

<!-- Custom JS -->
<script src="{{asset('/lucky/js/script.js')}}"></script>
@yield('additionalJs')

</body>
</html>
