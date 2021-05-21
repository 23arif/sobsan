@extends('layouts.dizayn')
@section('content')
<section id="product-pg">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="page-nav">
                        <a href="@if(Session('lang') == 'az') {{url('/')}} @else {{url(Session('lang').'/')}} @endif">Əsas səhifə</a>
                        <img src="{{asset('sobsan/img/icon/icons-page-nav.svg')}}" alt="">
                        <a href="">Kataloq</a>
                        @foreach($product_categories as $pr_cat)
                        <img src="{{asset('sobsan/img/icon/icons-page-nav.svg')}}" alt="">
                        <a href="@if(Session('lang') == 'az'){{url($pr_cat->getPrCatsTr->first()->slug)}} @else {{url(Session('lang').'/'.$pr_cat->getPrCatsTr->first()->slug)}} @endif">{{$pr_cat->getPrCatsTr->first()->name}}</a>
                        @endforeach
                    </div>
                </div>
                <div class="col-12">
                    <div class="heading-wrapper">
                        <h1 class="page-heading">{{$product->title}}</h1>
                        <div class="button-group">
                            <div class="socials">
                                <a href="#">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24">
                                        <g fill="none" fill-rule="evenodd">
                                            <g id="whatsapp-stroked" class="icon" fill="#000" fill-rule="nonzero">
                                                <path d="M12 1c2.928.001 5.68 1.137 7.749 3.198 2.097 2.09 3.252 4.831 3.251 7.719-.001 2.908-1.152 5.648-3.24 7.713-2.082 2.061-4.839 3.196-7.76 3.196-1.721 0-3.423-.406-4.948-1.175l-6.022 1.37 1.31-5.953C1.463 15.448 1 13.673 1 11.914c.003-2.912 1.153-5.655 3.239-7.719C6.32 2.135 9.077 1 11.999 1zm0 1.719c-5.115 0-9.278 4.127-9.281 9.193 0 1.565.44 3.152 1.274 4.59l.168.29-.87 3.952 4.004-.91.285.154c1.347.732 2.874 1.119 4.416 1.12 5.12 0 9.283-4.124 9.285-9.192 0-2.427-.974-4.736-2.745-6.5-1.745-1.738-4.066-2.696-6.537-2.697zM9.005 7.102c.18.007.378.021.567.439l.047.108c.239.548.663 1.636.722 1.753.063.126.105.272.021.44-.084.167-.12.271-.245.418-.126.146-.279.3-.392.412-.126.125-.257.26-.11.512.146.25.665 1.098 1.414 1.763.96.854 1.763 1.124 2.015 1.25.251.125.398.104.545-.063.147-.168.64-.748.808-.998.168-.251.336-.21.567-.126.23.084 1.464.7 1.715.826.252.125.42.188.483.293.062.105.062.607-.147 1.192-.21.586-1.237 1.15-1.699 1.192-.46.042-.893.208-3.019-.627C9.741 14.88 8.126 12.268 8 12.1c-.126-.167-1.027-1.36-1.027-2.593 0-1.234.65-1.84.88-2.092.23-.25.503-.313.671-.313z" />
                                            </g>
                                        </g>
                                    </svg>
                                </a>
                                <a href="#">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24">
                                        <g fill="none" fill-rule="evenodd">
                                            <g id="share-stroked" class="icon" fill="#000" fill-rule="nonzero">
                                                <g>
                                                    <path d="M3.75 4.5C1.265 4.5-.75 6.515-.75 9s2.015 4.5 4.5 4.5 4.5-2.015 4.5-4.5-2.015-4.5-4.5-4.5zm0 1.5c1.657 0 3 1.343 3 3s-1.343 3-3 3-3-1.343-3-3 1.343-3 3-3zM17.25-.75c-2.485 0-4.5 2.015-4.5 4.5s2.015 4.5 4.5 4.5 4.5-2.015 4.5-4.5-2.015-4.5-4.5-4.5zm0 1.5c1.657 0 3 1.343 3 3s-1.343 3-3 3-3-1.343-3-3 1.343-3 3-3zM17.25 11.25c-2.485 0-4.5 2.015-4.5 4.5s2.015 4.5 4.5 4.5 4.5-2.015 4.5-4.5-2.015-4.5-4.5-4.5zm0 1.5c1.657 0 3 1.343 3 3s-1.343 3-3 3-3-1.343-3-3 1.343-3 3-3z" transform="translate(1 2)" />
                                                    <path d="M13.482 4.411c.386-.15.82.041.971.427.138.354-.012.749-.335.928l-.092.043L7.518 8.34c-.386.15-.82-.041-.971-.427-.138-.354.012-.749.335-.928l.092-.043 6.508-2.531zM6.434 10.343c.17-.34.563-.495.912-.375l.094.04 6.79 3.394c.37.185.521.636.336 1.006-.17.34-.563.495-.912.375l-.094-.04-6.79-3.394c-.37-.185-.521-.636-.336-1.006z" transform="translate(1 2)" />
                                                </g>
                                            </g>
                                        </g>
                                    </svg>
                                </a>
                            </div>
                            <div class="general">
                                <a href="#" class="compare">
                                    <svg class="compare-stroked" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24">
                                        <g fill="none" fill-rule="evenodd">
                                            <g id="compare-stroked" class="icon" fill="#000" fill-rule="nonzero">
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
                                    <svg class="compare-full" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24">
                                        <g fill="none" fill-rule="evenodd">
                                            <g id="compare-stroked" class="icon" fill="#d8232a" fill-rule="nonzero">
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
                                </a>
                                <a href="#" class="favorite">
                                    <svg class="favorite-stroked" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24">
                                        <g fill="none" fill-rule="evenodd">
                                            <g id="heart-stroked" class="icon" fill="#000" fill-rule="nonzero">
                                                <g>
                                                    <path d="M12 2.324l1.036-1.035c1.46-1.46 3.532-2.13 5.57-1.798 2.038.33 3.792 1.62 4.716 3.467 1.236 2.472.752 5.458-1.192 7.402l-9.589 10.003c-.295.308-.787.308-1.082 0l-9.577-9.988C-.075 8.419-.56 5.43.678 2.958 1.602 1.11 3.356-.18 5.394-.51c2.038-.331 4.11.338 5.57 1.798L12 2.324zm9.059 6.987c1.498-1.499 1.869-3.787.921-5.683-.708-1.415-2.052-2.403-3.614-2.657-1.562-.253-3.15.26-4.27 1.378L12.53 3.914c-.293.293-.767.293-1.06 0L9.904 2.35C8.784 1.231 7.196.718 5.634.971 4.072 1.225 2.728 2.213 2.02 3.63c-.95 1.896-.578 4.186.933 5.696L12 18.76l9.059-9.45z" transform="translate(0 2)" />
                                                </g>
                                            </g>
                                        </g>
                                    </svg>
                                    <svg class="favorite-full" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24">
                                        <g transform="translate(0.004 -40.99)">
                                            <g transform="translate(-0.000 42.5)">
                                                <path id="heart-filled" d="M22.006,42.93a6.744,6.744,0,0,0-9.467,0L12,43.468l-.543-.537a6.746,6.746,0,0,0-9.468,0,6.653,6.653,0,0,0,0,9.49l9.432,9.327a.817.817,0,0,0,1.159,0l9.429-9.328a6.653,6.653,0,0,0,0-9.49Z" transform="translate(0.004 -40.99)" fill="#d8232a" />
                                            </g>
                                        </g>
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="product-main">
                <div class="row">
                    <div class="col-12 col-lg-6 col-xl-7">
                        <div class="parameters soft">
                            <p>
                                <span class="key">Brend:</span>
                                <span class="value">{{$pr_details->getBrand->first()->name}}</span>
                            </p>
                            <p>
                                <span class="key">Kateqoriya: </span>
                                <span class="value">{{$pr_details->getPrCats->first()->getPrCatsTr->where('lang',Session('lang'))->first()->name}}</span>
                            </p>
                            <p>
                                <span class="key">Məhsulun kodu: </span>
                                <span class="value">{{$pr_details->code}}</span>
                            </p>
                        </div>
                        <div class="parameters tech">
                            <h2 class="inner-heading">Texniki parametrlər</h2>

                            
                            <p>
                                <span class="key">Brend:</span>
                                <span class="value">Sobsan</span>
                            </p>
                            
                            
                        </div>
                        <form id="product-form">
                            <div class="filter-block weight">
                                <h2 class="inner-heading">Çəkini seç</h2>
                                <div class="form-check-wrapper">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="weightCheck" id="weightCheck1">
                                        <label class="form-check-label active" for="weightCheck1">0.25 kg</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="weightCheck" id="weightCheck2">
                                        <label class="form-check-label" for="weightCheck2">0.5 kg</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="weightCheck" id="weightCheck3">
                                        <label class="form-check-label" for="weightCheck3">0.75 kg</label>
                                    </div>
                                </div>
                            </div>
                            <div class="filter-block color">
                                <h2 class="inner-heading">Rəngi seç</h2>
                                <div class="form-check-wrapper">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="colorCheck" id="colorCheck1" checked>
                                        <label class="form-check-label" for="colorCheck1" data-color="#ffffff" title="reng adi"><span></span></label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="colorCheck" id="colorCheck3">
                                        <label class="form-check-label" for="colorCheck3" data-color="green" title="reng adi"><span></span></label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="colorCheck" id="colorCheck4">
                                        <label class="form-check-label" for="colorCheck4" data-color="blue" title="reng adi"><span></span></label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="colorCheck" id="colorCheck5">
                                        <label class="form-check-label" for="colorCheck5" data-color="yellow" title="reng adi"><span></span></label>
                                    </div>
                                </div>
                            </div>
                            <div class="counter-block">
                                <div class="pr-counter">
                                    <div class="down">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                                            <g fill="none" fill-rule="evenodd">
                                                <g id="minus" class="icon" fill="#CFCFCF" fill-rule="nonzero">
                                                    <g>
                                                        <path d="M12 24c6.627 0 12-5.373 12-12S18.627 0 12 0 0 5.373 0 12c.007 6.624 5.376 11.993 12 12zM5.217 11.478c0-.576.468-1.043 1.044-1.043h11.478c.576 0 1.044.467 1.044 1.043v1.044c0 .576-.468 1.043-1.044 1.043H6.261c-.576 0-1.044-.467-1.044-1.043v-1.044z" />
                                                    </g>
                                                </g>
                                            </g>
                                        </svg>
                                    </div>
                                    <input id="amount" type="number" value="1" min="1" max="5" step="1" />
                                    <div class="up">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                                            <g fill="none" fill-rule="evenodd">
                                                <g id="plus" class="icon" fill="#CFCFCF" fill-rule="nonzero">
                                                    <g>
                                                        <path d="M0 12c0 6.627 5.373 12 12 12s12-5.373 12-12S18.627 0 12 0C5.376.007.007 5.376 0 12zm5.217-.522c0-.576.468-1.043 1.044-1.043h3.913c.144 0 .26-.117.26-.261V6.26c0-.576.468-1.044 1.044-1.044h1.044c.576 0 1.043.468 1.043 1.044v3.913c0 .144.117.26.261.26h3.913c.576 0 1.044.468 1.044 1.044v1.044c0 .576-.468 1.043-1.044 1.043h-3.913c-.144 0-.26.117-.26.261v3.913c0 .576-.468 1.044-1.044 1.044h-1.044c-.576 0-1.043-.468-1.043-1.044v-3.913c0-.144-.117-.26-.261-.26H6.26c-.576 0-1.044-.468-1.044-1.044v-1.044z" />
                                                    </g>
                                                </g>
                                            </g>
                                        </svg>
                                    </div>
                                </div>
                            </div>
                            <div class="add-cart-block">
                                <a href="#" class="btn-general primary">Səbətə at</a>
                            </div>
                            <div class="price-block">
                                <div class="pr-stock">
                                    <span class="stock-icon">&#10003;</span>
                                    <span>Anbarda: </span>
                                    <span class="stock-count">3</span>
                                    <span>ədəd</span>
                                </div>
                                <span class="pr-price">54.80 AZN</span>
                            </div>
                        </form>
                        <div class="one-cart">
                            <img src="img/birkart.png" alt="">
                            <p>Birkart-la 6 ay 10.89 AZN-dan hissə-hissə ödəmək imkanı</p>
                        </div>
                    </div>
                    <div class="col-12 col-lg-6 col-xl-5">
                        <div class="product-gallery">
                            <div class="swiper-container mySwiper2">
                                <div class="swiper-wrapper">
                                    @foreach($images as $img)
                                    <div class="swiper-slide">
                                        <div class="swiper-zoom-container">
                                            <a href="{{asset('public/Products/'.$img->img)}}" data-fancybox="gallery">
                                                <img src="{{asset('public/Products/'.$img->img)}}" />
                                            </a>
                                        </div>
                                    </div>
                                    @endforeach
                                    
                                </div>
                                <div class="swiper-button-next"></div>
                                <div class="swiper-button-prev"></div>
                                <div class="swiper-pagination"></div>
                            </div>
                            <div thumbsSlider="" class="swiper-container mySwiper">
                                <div class="swiper-wrapper">
                                    @foreach($images as $img)
                                    <div class="swiper-slide">
                                        <img src="{{asset('public/Products/'.$img->img)}}" />
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="product-about">
                <div class="row">
                    <div class="col-12">
                        <div class="heading-wrapper center">
                            <h1 class="page-heading">Məhsul haqqında</h1>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="about-text">
                            <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Ipsum velit similique repellendus ad, nulla ipsa doloribus asperiores aperiam eum expedita quis. Adipisci, aliquam perspiciatis delectus eum minus sequi quia dolorem? </p>
                        </div>
                    </div>
                </div>
            </div>
    </section>
    <section id="suggestions">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h1 class="section-heading">Bu məhsul ilə alırlar</h1>
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
                            <a class="pr-img" href="product.html"><img src="img/product/product-1.png" alt=""></a>
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
                                    <img class="compare-white" src="img/icon/icons-compare-white.svg" alt="">
                                    <span>Müqayisə</span>
                                </a>
                                <a class="btn-general add-favorite">
                                    <img class="heart-stroked" src="img/icon/icons-favourite.svg" alt="">
                                    <img class="heart-filled" src="img/icon/icons-favourite-full.svg" alt="">
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
                            <a class="pr-img" href="product.html"><img src="img/product/product-1.png" alt=""></a>
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
                                    <img class="compare-white" src="img/icon/icons-compare-white.svg" alt="">
                                    <span>Müqayisə</span>
                                </a>
                                <a class="btn-general add-favorite">
                                    <img class="heart-stroked" src="img/icon/icons-favourite.svg" alt="">
                                    <img class="heart-filled" src="img/icon/icons-favourite-full.svg" alt="">
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
                            <a class="pr-img" href="product.html"><img src="img/product/product-1.png" alt=""></a>
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
                                    <img class="compare-white" src="img/icon/icons-compare-white.svg" alt="">
                                    <span>Müqayisə</span>
                                </a>
                                <a class="btn-general add-favorite">
                                    <img class="heart-stroked" src="img/icon/icons-favourite.svg" alt="">
                                    <img class="heart-filled" src="img/icon/icons-favourite-full.svg" alt="">
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
                            <a class="pr-img" href="product.html"><img src="img/product/product-1.png" alt=""></a>
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
                                    <img class="compare-white" src="img/icon/icons-compare-white.svg" alt="">
                                    <span>Müqayisə</span>
                                </a>
                                <a class="btn-general add-favorite">
                                    <img class="heart-stroked" src="img/icon/icons-favourite.svg" alt="">
                                    <img class="heart-filled" src="img/icon/icons-favourite-full.svg" alt="">
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section id="similar">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h1 class="section-heading">Oxşar məhsullar</h1>
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
                            <a class="pr-img" href="product.html"><img src="img/product/product-1.png" alt=""></a>
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
                                    <img class="compare-white" src="img/icon/icons-compare-white.svg" alt="">
                                    <span>Müqayisə</span>
                                </a>
                                <a class="btn-general add-favorite">
                                    <img class="heart-stroked" src="img/icon/icons-favourite.svg" alt="">
                                    <img class="heart-filled" src="img/icon/icons-favourite-full.svg" alt="">
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
                            <a class="pr-img" href="product.html"><img src="img/product/product-1.png" alt=""></a>
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
                                    <img class="compare-white" src="img/icon/icons-compare-white.svg" alt="">
                                    <span>Müqayisə</span>
                                </a>
                                <a class="btn-general add-favorite">
                                    <img class="heart-stroked" src="img/icon/icons-favourite.svg" alt="">
                                    <img class="heart-filled" src="img/icon/icons-favourite-full.svg" alt="">
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
                            <a class="pr-img" href="product.html"><img src="img/product/product-1.png" alt=""></a>
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
                                    <img class="compare-white" src="img/icon/icons-compare-white.svg" alt="">
                                    <span>Müqayisə</span>
                                </a>
                                <a class="btn-general add-favorite">
                                    <img class="heart-stroked" src="img/icon/icons-favourite.svg" alt="">
                                    <img class="heart-filled" src="img/icon/icons-favourite-full.svg" alt="">
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
                            <a class="pr-img" href="product.html"><img src="img/product/product-1.png" alt=""></a>
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
                                    <img class="compare-white" src="img/icon/icons-compare-white.svg" alt="">
                                    <span>Müqayisə</span>
                                </a>
                                <a class="btn-general add-favorite">
                                    <img class="heart-stroked" src="img/icon/icons-favourite.svg" alt="">
                                    <img class="heart-filled" src="img/icon/icons-favourite-full.svg" alt="">
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
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
                        $('.qtyCount').html(parseInt($oldQty) + 1);
                        $('.qtyCount0').html(parseInt($('.qtyCount0').text()) + 1);
                        $('.qtyCount1').html(parseInt($('.qtyCount1').text()) + 1);
                    }
                    $('.addToCartResponse').css("display", "flex").fadeOut(4000);
                }
            });
        }

        function addToWish($pr) {
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
                        $('.wishCount').html(parseInt($oldQty) - 1);
                        $('.wishCount0').html(parseInt($('.wishCount0').text()) - 1)
                        $('.wishCount1').html(parseInt($('.wishCount1').text()) - 1)
                    }
                }
            });
        }
    </script>

    <script type="text/javascript">

        $('#checkbutton').click(function(){
            $('#form2 :input').not(':submit').clone().hide().appendTo('#form1');
            return true;
        });

        $('#form2 select').on("change",function(){
            $('#form1 :input').not(':submit').clone().hide().appendTo('#form2');
            $(this).closest('form').submit();
            return true;
        })
    </script>
@endsection

