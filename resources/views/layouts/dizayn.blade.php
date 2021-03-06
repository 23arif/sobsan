<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="keywords" content="">
    <meta name="description" content="">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;300;400;600;700;800;900&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <link rel="stylesheet" href="{{asset('sobsan/css/swiper-bundle.min.css')}}">
    <link rel="stylesheet" href="{{asset('sobsan/css/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{asset('sobsan/css/owl.theme.default.css')}}">
    <link rel="stylesheet" href="{{asset('sobsan/css/jquery.fancybox.min.css')}}">
    <link rel="stylesheet" href="{{asset('sobsan/css/style.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('sobsan/css/responsive.css')}}" type="text/css">
    <title>Sobsan</title>
</head>
<body class="@if(isset($class) and $class=='home')home @endif @if(!isset($discount->id)) discount-off @endif">
    <!-- Scroll to top button -->
    <button id="btn-scroll-top">
        <svg xmlns="http://www.w3.org/2000/svg" width="8.067" height="15.4" viewBox="0 0 8.067 15.4">
            <g id="icons-arrow-red" transform="translate(-6.507 15.2) rotate(-90)">
                <g id="Group_7" data-name="Group 7" transform="translate(0.5 7.497)">
                    <g id="Group_6" data-name="Group 6" transform="translate(0 0)">
                        <path id="Path_7" data-name="Path 7" d="M11.457.5,14.5,3.54,11.457,6.584M14.5,3.54H.5" transform="translate(-0.5 -0.497)" fill="none" stroke="#fff" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.4" fill-rule="evenodd" />
                    </g>
                </g>
            </g>
        </svg>
    </button>
    <!-- Fixed Side Toolbar -->
    <div class="toolbar">
        <ul>
            <li>
                <a href="cart.html">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                        <g fill="none" fill-rule="evenodd" stroke-linecap="round" stroke-linejoin="round">
                            <g stroke="#000" stroke-width="1.5">
                                <g>
                                    <path d="M5 18.125h9.921c.732 0 1.357-.528 1.479-1.249l2.637-15.5c.123-.72.748-1.248 1.479-1.248h.984M6.875 20.375c.207 0 .375.168.375.375s-.168.375-.375.375-.375-.168-.375-.375.168-.375.375-.375M14.375 20.375c.207 0 .375.168.375.375s-.168.375-.375.375S14 20.957 14 20.75s.168-.375.375-.375" transform="translate(1 1)" />
                                    <path d="M16.953 13.625H4.882c-1.376 0-2.576-.937-2.91-2.272l-1.45-5.8c-.056-.224-.006-.462.137-.644.142-.182.36-.288.591-.288h17.234" transform="translate(1 1)" />
                                </g>
                            </g>
                        </g>
                    </svg>
                    <span class="tool-name">S??b??t</span>
                    <span class="tool-count">9+</span>
                </a>
            </li>
            <li>
                <a href="wishlist.html">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                        <g fill="none" fill-rule="evenodd">
                            <g fill="#000" fill-rule="nonzero">
                                <g>
                                    <path d="M12 2.324l1.036-1.035c1.46-1.46 3.532-2.13 5.57-1.798 2.038.33 3.792 1.62 4.716 3.467 1.236 2.472.752 5.458-1.192 7.402l-9.589 10.003c-.295.308-.787.308-1.082 0l-9.577-9.988C-.075 8.419-.56 5.43.678 2.958 1.602 1.11 3.356-.18 5.394-.51c2.038-.331 4.11.338 5.57 1.798L12 2.324zm9.059 6.987c1.498-1.499 1.869-3.787.921-5.683-.708-1.415-2.052-2.403-3.614-2.657-1.562-.253-3.15.26-4.27 1.378L12.53 3.914c-.293.293-.767.293-1.06 0L9.904 2.35C8.784 1.231 7.196.718 5.634.971 4.072 1.225 2.728 2.213 2.02 3.63c-.95 1.896-.578 4.186.933 5.696L12 18.76l9.059-9.45z" transform="translate(0 2)" />
                                </g>
                            </g>
                        </g>
                    </svg>
                    <span class="tool-name">Se??ilmi??l??r</span>
                    <span class="tool-count">9+</span>
                </a>
            </li>
            <li>
                <a href="compare.html">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                        <g fill="none" fill-rule="evenodd">
                            <g fill="#000" fill-rule="nonzero">
                                <g>
                                    <path d="M11.25 3c.38 0 .694.282.743.648L12 3.75v18c0 .414-.336.75-.75.75-.38 0-.693-.282-.743-.648l-.007-.102v-18c0-.414.336-.75.75-.75z" transform="translate(1)" />
                                    <path d="M15.75 21c.414 0 .75.336.75.75 0 .38-.282.693-.648.743l-.102.007h-9c-.414 0-.75-.336-.75-.75 0-.38.282-.693.648-.743L6.75 21h9zM18 1.5c.414 0 .75.336.75.75 0 .38-.282.693-.648.743L18 3h-5.25c-.414 0-.75-.336-.75-.75 0-.38.282-.693.648-.743l.102-.007H18zM9.75 1.5c.414 0 .75.336.75.75 0 .38-.282.693-.648.743L9.75 3H4.5c-.414 0-.75-.336-.75-.75 0-.38.282-.693.648-.743L4.5 1.5h5.25z" transform="translate(1)" />
                                    <path d="M11.25 0C10.008 0 9 1.007 9 2.25s1.008 2.25 2.25 2.25c1.243 0 2.25-1.007 2.25-2.25S12.493 0 11.25 0zm0 1.5c.414 0 .75.336.75.75s-.336.75-.75.75-.75-.336-.75-.75.336-.75.75-.75zM8.25 12H.75c-.414 0-.75.336-.75.75 0 2.485 2.015 4.5 4.5 4.5S9 15.235 9 12.75c0-.414-.336-.75-.75-.75zm-.847 1.5l-.025.102C7.01 14.844 5.86 15.75 4.5 15.75l-.176-.005c-1.283-.074-2.35-.955-2.701-2.143l-.027-.102h5.807zM3.83 1.915c.185-.37.635-.521 1.006-.336.34.17.494.563.374.912l-.039.094-3.75 7.5c-.185.37-.636.521-1.006.336-.34-.17-.494-.563-.375-.912l.04-.094 3.75-7.5z" transform="translate(1)" />
                                    <path d="M4.165 1.58c.34-.17.746-.059.954.247l.052.088 3.75 7.5c.185.37.035.82-.335 1.006-.34.17-.747.058-.955-.248l-.052-.088-3.75-7.5c-.185-.37-.035-.82.336-1.006zM21.75 12h-7.5c-.414 0-.75.336-.75.75 0 2.485 2.015 4.5 4.5 4.5s4.5-2.015 4.5-4.5c0-.414-.336-.75-.75-.75zm-.847 1.5l-.025.102C20.51 14.844 19.36 15.75 18 15.75l-.176-.005c-1.283-.074-2.35-.955-2.701-2.143l-.027-.102h5.807zM17.33 1.915c.185-.37.635-.521 1.006-.336.34.17.494.563.374.912l-.039.094-3.75 7.5c-.185.37-.636.521-1.006.336-.34-.17-.494-.563-.375-.912l.04-.094 3.75-7.5z" transform="translate(1)" />
                                    <path d="M17.665 1.58c.34-.17.746-.059.954.247l.052.088 3.75 7.5c.185.37.035.82-.335 1.006-.34.17-.747.058-.955-.248l-.052-.088-3.75-7.5c-.185-.37-.035-.82.336-1.006z" transform="translate(1)" />
                                </g>
                            </g>
                        </g>
                    </svg>
                    <span class="tool-name">M??qayis??l??rim</span>
                    <span class="tool-count">9+</span>
                </a>
            </li>
        </ul>
    </div>
    <header id="header" class="@if(isset($class) and $class=='home') home-header @else page-header @endif">
        <div class="container">
            <div class="primary-header">
                <div class="header-wrapper">
                    <div class="header-left d-none d-lg-block">
                        <ul>
                            @foreach($menus as $menu)
                            <li><a href="{{$menu->getMenu->where('lang',Session('lang'))->first()->slug}}">{{$menu->getMenu->where('lang',Session('lang'))->first()->name}}</a></li>
                            @endforeach
                            
                        </ul>
                    </div>
                    <div class="menu-toggle outer d-block d-lg-none">
                        <div class="bar">
                            <div class="one"></div>
                            <div class="two"></div>
                            <div class="three"></div>
                        </div>
                    </div>
                    <div class="header-right">
                        <div class="header-block d-none d-lg-block">
                            <ul class="header-social">
                                <li class="block-item"><a target="_blank" class="block-link" href="{{$settings->facebook}}"><img src="{{asset('sobsan/img/icon/social-facebook.svg')}}" alt="facebook"></a></li>
                                <li class="block-item"><a target="_blank" class="block-link" href="{{$settings->instagram}}"><img src="{{asset('sobsan/img/icon/social-instagram.svg')}}" alt="instagram"></a></li>
                                <li class="block-item"><a target="_blank" class="block-link" href="{{$settings->youtube}}"><img src="{{asset('sobsan/img/icon/social-youtube.svg')}}" alt="youtube"></a></li>
                            </ul>
                        </div>
                        <div class="header-block">
                            <a class="block-link" href="compare.html">
                                <img src="{{asset('sobsan/img/icon/icons-compare.svg')}}" alt="compare">
                                <!-- <span class="cart-badge">9+</span> -->
                            </a>
                        </div>
                        <div class="header-block">
                            <a class="block-link" href="wishlist.html"><img src="{{asset('sobsan/img/icon/icons-favourite.svg')}}" alt="favorite">
                                <!-- <span class="cart-badge">9+</span></a> -->
                        </div>
                        <div class="header-block">
                            <a class="block-link" href="cart.html"><img src="{{asset('sobsan/img/icon/icons-cart.svg')}}" alt="favorite">
                                <!-- <span class="cart-badge">9+</span> -->
                            </a>
                        </div>
                        <div class="header-block search">
                            <form action="" class="search-form" id="search-form1">
                                <span class="block-link">
                                    <img src="{{asset('sobsan/img/icon/loupe.svg')}}" alt="">
                                </span>
                                <input type="text" name="search" class="search-input" id="search-input1" placeholder="Axtar..." required>
                            </form>
                        </div>
                        <div class="header-block lang">
                            <span class="selected-lang">{{ucfirst(Session('lang'))}} <img src="{{asset('sobsan/img/icon/icons-arrow-down.svg')}}" alt=""> </span>
                            @if(Session('lang') == 'az')
                            <ul class="lang-list">
                                <li><a href="{{url($lang['en'])}}">En</a></li>
                                <li><a href="{{url($lang['ru'])}}">Ru</a></li>
                            </ul>
                            @elseif(Session('lang') == 'en')
                            <ul class="lang-list">
                                <li><a href="{{url($lang['az'])}}">Az</a></li>
                                <li><a href="{{url($lang['ru'])}}">Ru</a></li>
                            </ul>
                            @elseif(Session('lang') == 'ru')
                            <ul class="lang-list">
                                <li><a href="{{url($lang['az'])}}">Az</a></li>
                                <li><a href="{{url($lang['en'])}}">En</a></li>
                            </ul>
                            @endif
                        </div>
                        <div class="header-block signup d-none d-lg-flex">
                            <a class="block-link" href="login"><img src="{{asset('sobsan/img/icon/icons-login.svg')}}" alt="favorite">Giri??</a>

                            <!-- <a class="block-link" href="profile.html">
                                <img src="img/icon/icons-user.svg" alt="favorite">
                                <span>Hesab??m</span>
                            </a> -->
                        </div>
                    </div>
                </div>
            </div>
            <div class="secondary-header d-none d-lg-block">
                <div class="header-wrapper">
                    <div class="left">
                        <div class="header-logo">
                        <a href="@if(Session('lang') == 'az') {{url('/')}} @else {{url(Session('lang'))}} @endif"><img src="{{asset('sobsan/img/logo.svg')}}" alt=""></a>
                    </div>
                    <div class="cat-nav">
                        <ul class="cat-list">
                            @foreach($cats as $cat)
                            <li class="cat-item">
                                <a style="cursor:pointer;" @if(Session('lang') == 'az') href="{{url($cat->getCat->where('lang',Session('lang'))->first()->slug)}}" @else href="{{url(Session('lang').'/'.$cat->getCat->where('lang',Session('lang'))->first()->slug)}}" @endif  class="cat-link">{{$cat->getCat->where('lang',Session('lang'))->first()->name}}</a>
                                @if(isset($cat->children[0]->id))
                                <div class="dropdown-wrapper">
                                    <ul class="cat-dropdown-list">
                                        @foreach($cat->children as $child)
                                        <li class="cat-item">
                                            <a href="@if(Session('lang') == 'az') {{url($child->getCat->where('lang',Session('lang'))->first()->slug)}} @else {{url(Session('lang').'/'.$child->getCat->where('lang',Session('lang'))->first()->slug)}} @endif" class="cat-link">{{$child->getCat->where('lang',Session('lang'))->first()->name}} </a>
                                        </li>
                                        @endforeach
                                        
                                    </ul>
                                </div>
                                @endif
                            </li>
                            @endforeach
                            
                        </ul>
                    </div>
                    </div>
                    <div class="right">
                        <div class="header-block search">
                            <form action="" id="search-form-2" class="search-form">
                                <span class="block-link">
                                    <img src="{{asset('sobsan/img/icon/loupe.svg')}}" alt="">
                                </span>
                                <input type="text" name="search" id="search-input-2" class="search-input" placeholder="Axtar..." required>
                            </form>
                        </div>
                        <div class="header-block lang">
                            <span class="selected-lang">{{ucfirst(Session('lang'))}} <img src="{{asset('sobsan/img/icon/icons-arrow-down.svg')}}" alt=""> </span>
                            @if(Session('lang') == 'az')
                            <ul class="lang-list">
                                <li><a href="{{url($lang['en'])}}">En</a></li>
                                <li><a href="{{url($lang['ru'])}}">Ru</a></li>
                            </ul>
                            @elseif(Session('lang') == 'en')
                            <ul class="lang-list">
                                <li><a href="{{url($lang['az'])}}">Az</a></li>
                                <li><a href="{{url($lang['ru'])}}">Ru</a></li>
                            </ul>
                            @elseif(Session('lang') == 'ru')
                            <ul class="lang-list">
                                <li><a href="{{url($lang['az'])}}">Az</a></li>
                                <li><a href="{{url($lang['en'])}}">En</a></li>
                            </ul>
                            @endif
                        </div>
                        <div class="header-block signup">
                            <a class="block-link" href="signin.html"><img src="{{asset('sobsan/img/icon/icons-login.svg')}}" alt="favorite">Giri??</a>

                           <!--  <a class="block-link" href="profile.html">
                                <img src="img/icon/icons-user.svg" alt="favorite">
                                <span>Hesab??m</span>
                            </a> -->
                        </div>
                    </div>
                </div>
            </div>
            <div class="mobile-menu d-block d-lg-none">
                <div class="menu-wrapper">
                    <div class="menu-header">
                        <div class="mobile-logo">
                            <a href="@if(Session('lang') == 'az') {{url('/')}} @else {{url(Session('lang'))}} @endif"><a href="index.html"><img src="{{asset('sobsan/img/logo.svg')}}" alt=""></a></a>
                        </div>
                        <div class="phone-block">
                            <a href="tel:055 313 33 33">
                                <div class="block-img">
                                    <img src="{{asset('sobsan/img/icon/icons-phone.svg')}}" alt="">
                                </div>
                                <span class="d-none d-sm-block">{{$settings->nomre}}</span>
                            </a>
                        </div>
                        <div class="chat-block">
                            <a href="mailto:sobsan@info.com">
                                <div class="block-img">
                                    <img src="{{asset('sobsan/img/icon/icons-question.svg')}}" alt="">
                                </div>
                                <span class="d-none d-sm-block">{{$settings->email}}</span>
                            </a>
                        </div>
                        <div class="login-block">
                            <a class="block-link" href="login">
                                <img src="{{asset('sobsan/img/icon/icons-login.svg')}}" alt="favorite">
                                <span>Giri??</span>
                            </a>
                            <!-- <a class="block-link" href="profile.html">
                                <img src="img/icon/icons-user.svg" alt="favorite">
                                <span>Hesab??m</span>
                            </a> -->
                        </div>
                        <div class="menu-toggle inner active d-block d-lg-none">
                            <div class="bar">
                                <div class="one"></div>
                                <div class="two"></div>
                                <div class="three"></div>
                            </div>
                        </div>
                    </div>
                    <div class="menu-body">
                        <div class="categories catalog-left">
                            <ul class="category-list">
                                @foreach($cats as $cat)
                                <li class="category-list-item">
                                    <div class="item-container">
                                        <a class="category-list-link" href=" @if(Session('lang') == 'az') {{url($cat->getCat->where('lang',Session('lang'))->first()->slug)}} @else {{url(Session('lang').'/'.$cat->getCat->where('lang',Session('lang'))->first()->slug)}} @endif ">{{$cat->getCat->where('lang',Session('lang'))->first()->name}}</a>
                                        @if(isset($cat->children[0]->id))
                                        <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 8 12.955">
                                            <path id="Path_6" data-name="Path 6" d="M10.112,6,8.59,7.522l4.945,4.955L8.59,17.433l1.522,1.522,6.478-6.478Z" transform="translate(-8.59 -6)" fill="#d8232a" fill-rule="evenodd" />
                                        </svg>
                                        @endif
                                    </div>
                                    @if(isset($cat->children[0]->id))
                                    <ul class="sub-category-list">
                                        @foreach($cat->children as $child)
                                        <li class="category-list-item">
                                            <div class="item-container">
                                                <a class="category-list-link" href="@if(Session('lang') == 'az') {{url($child->getCat->where('lang',Session('lang'))->first()->slug)}} @else {{url(Session('lang').'/'.$child->getCat->where('lang',Session('lang'))->first()->slug)}} @endif">{{$child->getCat->where('lang',Session('lang'))->first()->name}} </a>
                                                @if(isset($child->children[0]->id))
                                                <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 8 12.955">
                                                    <path id="Path_6" data-name="Path 6" d="M10.112,6,8.59,7.522l4.945,4.955L8.59,17.433l1.522,1.522,6.478-6.478Z" transform="translate(-8.59 -6)" fill="#d8232a" fill-rule="evenodd" />
                                                </svg>
                                                @endif
                                            </div>
                                            @if(isset($child->children[0]->id))
                                            <ul class="sub-category-list">
                                                @foreach($child->children as $chil)
                                                <li class="category-list-item">
                                                    <div>
                                                        <a class="category-list-link" href="@if(Session('lang') == 'az') {{url($chil->getCat->where('lang',Session('lang'))->first()->slug)}} @else {{url(Session('lang').'/'.$chil->getCat->where('lang',Session('lang'))->first()->slug)}} @endif">{{$chil->getCat->where('lang',Session('lang'))->first()->name}} </a>
                                                    </div>
                                                </li>
                                                @endforeach
                                                
                                            </ul>
                                            @endif
                                        </li>
                                        @endforeach
                                        
                                    </ul>
                                    @endif
                                </li>
                                @endforeach
                                
                            </ul>
                        </div>
                        <div class="pages">
                            <ul class="page-list">

                                @foreach($menus as $menu)
                            <li><a href="{{$menu->getMenu->where('lang',Session('lang'))->first()->slug}}">{{$menu->getMenu->where('lang',Session('lang'))->first()->name}}</a></li>
                            @endforeach
                                
                            </ul>
                        </div>
                    </div>
                    <div class="menu-footer">
                        <ul class="menu-social">
                            <li><a class="block-link" target="_blank" href="{{$settings->facebook}}"><img src="{{asset('sobsan/img/icon/social-facebook.svg')}}" alt="facebook"></a></li>
                            <li><a class="block-link" target="_blank" href="{{$settings->instagram}}"><img src="{{asset('sobsan/img/icon/social-instagram.svg')}}" alt="instagram"></a></li>
                            <li><a class="block-link" target="_blank" href="{{$settings->youtube}}"><img src="{{asset('sobsan/img/icon/social-youtube.svg')}}" alt="youtube"></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </header>

        @yield('content')
   <footer id="footer">
        <div class="container">
            <div class="primary-footer">
                <div class="row">
                    <div class="col-12 col-xl">
                        <div class="footer-logo">
                            <a href="@if(Session('lang') == 'az') {{url('/')}} @else {{url(Session('lang'))}} @endif"><img src="{{asset('sobsan/img/logo.svg')}}" alt=""></a>
                        </div>
                        <div class="header-block">
                            <ul class="header-social">
                                <li class="block-item"><a target="_blank" class="block-link" href="{{$settings->facebook}}"><img src="{{asset('sobsan/img/icon/social-facebook.svg')}}" alt="facebook"></a></li>
                                <li class="block-item"><a target="_blank" class="block-link" href="{{$settings->instagram}}"><img src="{{asset('sobsan/img/icon/social-instagram.svg')}}" alt="instagram"></a></li>
                                <li class="block-item"><a target="_blank" class="block-link" href="{{$settings->youtube}}"><img src="{{asset('sobsan/img/icon/social-youtube.svg')}}" alt="youtube"></a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-12 col-md-3 col-xl">
                        <div class="footer-link-block">
                            <p class="footer-heading">Menyular</p>
                            <ul class="footer-list">
                                @foreach($menus as $menu)
                            <li><a href="{{$menu->getMenu->where('lang',Session('lang'))->first()->slug}}">{{$menu->getMenu->where('lang',Session('lang'))->first()->name}}</a></li>
                            @endforeach
                            </ul>
                        </div>
                    </div>
                    <div class="col-12 col-md-3 col-xl">
                        <div class="footer-link-block">
                            <p class="footer-heading">Kateqoriyalar</p>
                            <ul class="footer-list">
                                @foreach($cats as $cat)
                                <li><a @if(Session('lang') == 'az') href="{{url($cat->getCat->where('lang',Session('lang'))->first()->slug)}}" @else href="{{url(Session('lang').'/'.$cat->getCat->where('lang',Session('lang'))->first()->slug)}}" @endif>{{$cat->getCat->where('lang',Session('lang'))->first()->name}}</a></li>
                                @endforeach
                                
                            </ul>
                        </div>
                    </div>
                    <div class="col-12 col-md-3 col-xl">
                        <div class="footer-link-block">
                            <p class="footer-heading">Filiallar</p>
                            <ul class="footer-list">
                                @foreach($branches as $branch)
                                <li><a href="@if(Session('lang') == 'az') {{url('xidmet-sebekesi')}} @elseif(Session('lang') == 'en') {{url('en/service-network')}} @elseif(Session('lang') == 'ru') {{url('ru/servisnaya-set')}} @endif">{{$branch->getBranch->where('lang',Session('lang'))->first()->name}}</a></li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    <div class="col-12 col-md-3 col-xl">
                        <div class="footer-link-block">
                            <p class="footer-heading">Faydal?? Linkl??r</p>
                            <ul class="footer-list">
                                <li><a href="#">F.A.Q</a></li>
                                <li><a href="@if(Session('lang') == 'az') {{url('career')}} @else {{url(Session('lang').'/career')}} @endif">Karyera</a></li>
                                
                            </ul>
                        </div>
                    </div>
                     
                </div>
            </div>
            <div class="secondary-footer">
                <div class="row">
                    <div class="col-12 col-lg-6">
                        <div class="copyright-left">
                            <div class="copyright-name">
                                <p>{{$home->copyrights}}</p>
                                <p>B??t??n h??quqlar qorunur.</p>
                            </div>
                            <div class="copyright-text">
                                <p>{{$home->footer_text}}</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-lg-6">
                        <div class="copyright-right">
                            <div class="contact-info">
                                <p>
                                    <a href="tel:(+994 12) 313 33 33">{{$settings->nomre}}</a>
                                    <span> / </span>
                                    <a href="mailto:info@sobsan.az">{{$settings->email}}</a>
                                </p>
                            </div>
                            <div class="address">
                                <p>{{$home->address}}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
    <script src="{{asset('sobsan/js/swiper-bundle.min.js')}}"></script>
    <script src="{{asset('sobsan/js/owl.carousel.min.js')}}"></script>
    <script src="{{asset('sobsan/js/tilt.jquery.js')}}"></script>
    <script src="{{asset('sobsan/js/jquery.fancybox.min.js')}}"></script>
    <script src="{{asset('sobsan/js/script.js')}}"></script>
</body>
</html>