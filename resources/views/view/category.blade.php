@extends('layouts.dizayn')
@section('content')
<section id="catalog-pg">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="page-nav">
                        <a href="@if(Session('lang') == 'az') {{url('/')}} @else {{url(Session('lang').'/')}} @endif">Əsas səhifə</a>
                        <img src="{{asset('sobsan/img/icon/icons-page-nav.svg')}}" alt="">
                        <a href="deals.html">Kataloq</a>
                        <img src="{{asset('sobsan/img/icon/icons-page-nav.svg')}}" alt="">
                        <a href="{{url($category->slug)}}">{{$category->name}}</a>
                    </div>
                </div>
                <div class="col-12">
                    <div class="heading-wrapper">
                        <h1 class="page-heading">{{$category->name}}</h1>
                    </div>
                </div>
            </div>
            <div class="row catalog-wrapper">
                <div class="col-12 col-lg-4 col-xl-3">
                    <div class="catalog-left">
                        <ul class="category-list">
                        	@foreach($cats as $cat)
                            <li class="category-list-item">
                                <div class="item-container">
                                    <a class="category-list-link" href="@if(Session('lang') == 'az'){{url($cat->getCat->where('lang',Session('lang'))->first()->slug)}}@else {{url(Session('lang').'/'.$cat->getCat->where('lang',Session('lang'))->first()->slug)}} @endif">{{$cat->getCat->where('lang',Session('lang'))->first()->name}}</a>
                                    @if(isset($cat->children[0]))
                                    <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 8 12.955">
                                        <path id="Path_6" data-name="Path 6" d="M10.112,6,8.59,7.522l4.945,4.955L8.59,17.433l1.522,1.522,6.478-6.478Z" transform="translate(-8.59 -6)" fill="#d8232a" fill-rule="evenodd" />
                                    </svg>
                                    @endif
                                </div>
                                @if(isset($cat->children[0]))
                                <ul class="sub-category-list">
                                    @foreach($cat->children as $child)
                                    <li class="category-list-item">
                                        <div class="item-container">
                                            <a class="category-list-link" href="@if(Session('lang') == 'az'){{url($child->getCat->where('lang',Session('lang'))->first()->slug)}}@else {{url(Session('lang').'/'.$child->getCat->where('lang',Session('lang'))->first()->slug)}} @endif">{{$child->getCat->where('lang',Session('lang'))->first()->name}}</a>
                                            @if(isset($child->children[0]))
                                            <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 8 12.955">
                                                <path id="Path_6" data-name="Path 6" d="M10.112,6,8.59,7.522l4.945,4.955L8.59,17.433l1.522,1.522,6.478-6.478Z" transform="translate(-8.59 -6)" fill="#d8232a" fill-rule="evenodd" />
                                            </svg>
                                            @endif
                                        </div>
                                        @if(isset($child->children[0]))
                                        <ul class="sub-category-list">
                                        	@foreach($child->children as $chil)
                                            <li class="category-list-item">
                                                <div>
                                                    <a class="category-list-link" href="@if(Session('lang') == 'az'){{url($chil->getCat->where('lang',Session('lang'))->first()->slug)}}@else {{url(Session('lang').'/'.$chil->getCat->where('lang',Session('lang'))->first()->slug)}} @endif">{{$chil->getCat->where('lang',Session('lang'))->first()->name}}</a>
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
                        <form action="">
                            <div class="filter-block price">
                                <h2 class="filter-name">
                                    <span>Qiymət</span>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 12.955 8">
                                        <path id="Path_6" data-name="Path 6" d="M10.112,6,8.59,7.522l4.945,4.955L8.59,17.433l1.522,1.522,6.478-6.478Z" transform="translate(-6 16.59) rotate(-90)" fill="#000" fill-rule="evenodd" />
                                    </svg>
                                </h2>
                                <div class="multi-range-slider">
                                    <input type="range" id="input-left" min="0" max="200" value="0">
                                    <input type="range" id="input-right" min="0" max="200" value="150">
                                    <div class="slider" id="test123">
                                        <div class="track"></div>
                                        <div class="range"></div>
                                        <div class="thumb left"></div>
                                        <div class="thumb right"></div>
                                    </div>
                                    <div class="result">
                                        <p>
                                            <span id="result-min"></span><span>AZN</span>
                                        </p>
                                        <p>
                                            <span id="result-max"></span><span>AZN</span>
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="filter-block brend">
                                <h2 class="filter-name">
                                    <span>Brend</span>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 12.955 8">
                                        <path id="Path_6" data-name="Path 6" d="M10.112,6,8.59,7.522l4.945,4.955L8.59,17.433l1.522,1.522,6.478-6.478Z" transform="translate(-6 16.59) rotate(-90)" fill="#000" fill-rule="evenodd" />
                                    </svg>
                                </h2>
                                <div class="form-check-wrapper">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="1" id="brendCheck1">
                                        <label class="form-check-label active" for="brendCheck1"> Sobsan </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="2" id="brendCheck2">
                                        <label class="form-check-label" for="brendCheck2"> Sobsan </label>
                                    </div>
                                </div>
                            </div>
                            <div class="filter-block weight">
                                <h2 class="filter-name">
                                    <span>Həcm</span>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 12.955 8">
                                        <path id="Path_6" data-name="Path 6" d="M10.112,6,8.59,7.522l4.945,4.955L8.59,17.433l1.522,1.522,6.478-6.478Z" transform="translate(-6 16.59) rotate(-90)" fill="#000" fill-rule="evenodd" />
                                    </svg>
                                </h2>
                                <div class="form-check-wrapper">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="1" id="weightCheck1">
                                        <label class="form-check-label active" for="weightCheck1">0.25 kg</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="2" id="weightCheck2">
                                        <label class="form-check-label" for="weightCheck2">0.5 kg</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="3" id="weightCheck3">
                                        <label class="form-check-label" for="weightCheck3">0.75 kg</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="4" id="weightCheck4">
                                        <label class="form-check-label" for="weightCheck4">1 kg</label>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-12 col-lg-8 col-xl-9">
                    <div class="catalog-right">
                        <div class="row">
                            <div class="col-12">
                                <div class="filters-wrapper">
                                    <form id="" action="" class="filter-left">
                                        <button type="submit" value="1">Qiymətinə görə<img src="img/icon/icons-arrow-down.svg" alt=""></button>
                                        <button type="submit" value="1">Adına görə<img src="img/icon/icons-arrow-down.svg" alt=""></button>
                                        <button type="submit" value="1">Populyarlığına görə<img src="img/icon/icons-arrow-down.svg" alt=""></button>
                                    </form>
                                    <div class="filter-right">
                                        <button class="filter-list">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 24 24">
                                                <g fill="none" fill-rule="evenodd">
                                                    <g fill="#000" fill-rule="nonzero">
                                                        <g transform="translate(0 2)">
                                                            <path d="M8.5 3.5H23c.552 0 1-.448 1-1s-.448-1-1-1H8.5c-.552 0-1 .448-1 1s.448 1 1 1zM23 9.5H8.5c-.552 0-1 .448-1 1s.448 1 1 1H23c.552 0 1-.448 1-1s-.448-1-1-1zM23 17.5H8.5c-.552 0-1 .448-1 1s.448 1 1 1H23c.552 0 1-.448 1-1s-.448-1-1-1z" />
                                                            <rect width="3" height="3" x="1" y=".998" rx=".5" />
                                                            <path d="M3.5 0h-2C.672 0 0 .672 0 1.5v2C0 4.328.672 5 1.5 5h2C4.328 5 5 4.328 5 3.5v-2C5 .672 4.328 0 3.5 0zM4 3.5c0 .276-.224.5-.5.5h-2c-.276 0-.5-.224-.5-.5v-2c0-.276.224-.5.5-.5h2c.276 0 .5.224.5.5v2z" />
                                                            <rect width="3" height="3" x="1" y="8.998" rx=".5" />
                                                            <path d="M3.5 8h-2C.672 8 0 8.672 0 9.5v2c0 .828.672 1.5 1.5 1.5h2c.828 0 1.5-.672 1.5-1.5v-2C5 8.672 4.328 8 3.5 8zm.5 3.5c0 .276-.224.5-.5.5h-2c-.276 0-.5-.224-.5-.5v-2c0-.276.224-.5.5-.5h2c.276 0 .5.224.5.5v2z" />
                                                            <rect width="3" height="3" x="1" y="16.998" rx=".5" />
                                                            <path d="M3.5 16h-2c-.828 0-1.5.672-1.5 1.5v2c0 .828.672 1.5 1.5 1.5h2c.828 0 1.5-.672 1.5-1.5v-2c0-.828-.672-1.5-1.5-1.5zm.5 3.5c0 .276-.224.5-.5.5h-2c-.276 0-.5-.224-.5-.5v-2c0-.276.224-.5.5-.5h2c.276 0 .5.224.5.5v2z" />
                                                        </g>
                                                    </g>
                                                </g>
                                            </svg>
                                        </button>
                                        <button class="filter-grid active">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 24 24">
                                                <g fill="none" fill-rule="evenodd">
                                                    <g fill="#000" fill-rule="nonzero">
                                                        <g>
                                                            <rect width="11" height="11" rx="1.5" />
                                                            <rect width="11" height="11" x="13" rx="1.5" />
                                                            <rect width="11" height="11" y="13" rx="1.5" />
                                                            <rect width="11" height="11" x="13" y="13" rx="1.5" />
                                                        </g>
                                                    </g>
                                                </g>
                                            </svg>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row grid-list-container">
                        	@foreach($products as $product)

                            <div class="col-12 col-sm-6 col-xl-4 grid-list-block">
                                <div class="product-cart">
                                    <div class="cart-header">
                                    	@if($product->getPrdetails->first()->new == 1)
                                        <span class="pr-label secondary">Yenİ</span>
                                        @endif
                                        @if($product->getPrdetails->first()->offer == 1)
                                        <span class="pr-label primary">Təklif olunan</span>
                                        @endif
                                    </div>
                                    <div class="cart-body">
                                        <a class="pr-img" href="@if(Session('lang') == 'az'){{url('product/'.$product->getPrdetails->first()->getPr->where('lang',Session('lang'))->first()->slug)}} @else {{url(Session('lang').'/product/'.$product->getPrdetails->first()->getPr->where('lang',Session('lang'))->first()->slug)}} @endif"><img src="{{asset('public/Products/'.$product->getPrdetails->first()->blog_img)}}" alt="{{$product->getPrdetails->first()->getPr->where('lang',Session('lang'))->first()->title}}"></a>
                                        <div class="cart-info">
                                            <div class="grid-list">
                                                <span class="pr-brand">Sobsan</span>
                                                <a href="@if(Session('lang') == 'az'){{url('product/'.$product->getPrdetails->first()->getPr->where('lang',Session('lang'))->first()->slug)}} @else {{url(Session('lang').'/product/'.$product->getPrdetails->first()->getPr->where('lang',Session('lang'))->first()->slug)}} @endif" class="pr-name">{{$product->getPrdetails->first()->getPr->where('lang',Session('lang'))->first()->title}}</a>
                                            </div>
                                            <div class="grid-list">
                                                <p class="pr-desc">{{$product->getPrdetails->first()->getPr->where('lang',Session('lang'))->first()->blog_text}}</p>
                                            </div>
                                            <div class="grid-list">
                                                <span class="pr-price">{{$product->getPrdetails->first()->price}} AZN</span>
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
                            @endforeach
                            
                        </div>
                    </div>
                </div>
            </div>
    </section>
@endsection
