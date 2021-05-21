@extends('layouts.dizayn')
@section('content')
<!-- Title -->
    <title>Lucky | {{$product->getPr->where('lang',Session('lang'))->first()->title}}</title>

    <section id="product-info">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <p class="product-path">
                        <a href="{{route('homepage',['locale'=>Session('lang')])}}">{{__('esas.anasehve')}}</a> /
                        @foreach(explode(',',$product->cat_id) as $prCat)
                            @foreach(\App\Category::all() as $allCats)
                                @if($allCats->id == $prCat)
                                    @if(Session('lang') =='az')
                                        <a href="{{route(__('routes.proo')[0],['locale'=>Session('lang'),'slug'=>$allCats->getCat->where('lang',Session('lang'))->first()->slug])}}">{{$allCats->getCat->where('lang',Session('lang'))->first()->name}}</a>
                                        /
                                    @elseif(Session('lang') == 'en')
                                        <a href="{{route(__('routes.proo')[1],['locale'=>Session('lang'),'slug'=>$allCats->getCat->where('lang',Session('lang'))->first()->slug])}}">{{$allCats->getCat->where('lang',Session('lang'))->first()->name}}</a>
                                        /
                                    @elseif(Session('lang') == 'ru')
                                        <a href="{{route(__('routes.proo')[2],['locale'=>Session('lang'),'slug'=>$allCats->getCat->where('lang',Session('lang'))->first()->slug])}}">{{$allCats->getCat->where('lang',Session('lang'))->first()->name}}</a>
                                        /
                                    @endif
                                @endif
                            @endforeach
                        @endforeach
                        <a class="active">{{$product->getPr->where('lang',Session('lang'))->first()->title}}</a>
                    </p>
                </div>
            </div>
            <div class="row">
                <div class="col-12 col-md-7 col-lg-6 col-xl-5">
                    <div class="page">
                        <div class="sp-loading"><img src="{{asset('/lucky/images/icon/loading.gif')}}" alt=""></div>
                        <div class="sp-wrap">
                                <a href="{{asset('public/Products/'.$product->blog_img)}}"><img
                                        src="{{asset('public/Products/'.$product->blog_img)}}" alt=""></a>
                                @foreach($product->getPrImgs as $prImg)
                                    <a href="{{asset('public/Products/'.$prImg->img)}}"><img
                                            src="{{asset('public/Products/'.$prImg->img)}}" alt=""></a>
                                @endforeach
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-5 col-lg-6 col-xl-7">
                    <div class="product-info-data">
                        <h5 class="product-name">{{ucfirst($product->getPr->where('lang',Session('lang'))->first()->title)}}</h5>
                        <p class="product-price">{{__('esas.mehsulQiymət')}}: <strong>
                                {{$product->price}} Azn &nbsp;
                                @if($product->discount > 0)
                                    <s>
                                        {{$product->discount}}
                                    </s>Azn
                                @endif
                            </strong></p>
                        @if(count($product->getPrColors)>0)
                            {{__('esas.mehsulReng')}}
                            <div class="color-container">
                                @foreach($product->getPrColors as $singleColor)
                                    <label for="{{Str::slug($singleColor->getColors->id)}}">
                                        <input type="radio" name="pr_color"
                                               id="{{Str::slug($singleColor->getColors->id)}}"
                                               class="colored-radio"
                                               style="background-color: {{$singleColor->getColors->code}}">
                                    </label>
                                @endforeach
                            </div>
                        @endif
                        <p class="product-desc">
                            {!! $product->getPr->where('lang',Session('lang'))->first()->description !!}
                        </p>
                    </div>
                    <div class="product-count">
                        @if(\Illuminate\Support\Facades\Auth::user())
                            <div class="counter">
                                <div class="down" onclick="decreaseQty(this)">-</div>
                                <input type="number" class="descPrQty" value="1" min="1" step="1" readonly/>
                                <div class="up" onclick="increaseQty(this)">+</div>
                            </div>
                            <button onclick="addToCart('{{$product->id}}')"
                                    class="btn-general orange" style="cursor: pointer">{{__('esas.sebeteAt')}}
                                <img src="{{asset('lucky/images/general/cart.svg')}}" alt=""/></button>
                        @else
                            <div class="counter">
                                <div class="down" onclick="decreaseQty(this)">-</div>
                                <input type="number" class="descPrQty" value="1" min="1" step="1" readonly/>
                                <div class="up" onclick="increaseQty(this)">+</div>
                            </div>
                            <button onclick="addToCart('{{$product->id}}')"
                                    class="btn-general orange" style="cursor: pointer">{{__('esas.sebeteAt')}}
                                <img src="{{asset('lucky/images/general/cart.svg')}}" alt=""/></button>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>

     <section id="reletedPr-carousel" class="lg-show">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <header class="sec-heading">
                        <h1>Oxşar Məhsullar</h1>
                    </header>
                </div>
                <div id="partner-carousel">
                    <div class="col-12">
                        <div class="owl-carousel owl-theme">
                             @foreach($reletedPr as $product)
                                <div class="tool-box item">
                                    <div class="tool-box-header @if($product->new == 0 && $product->offer == 0) justify-content-end @endif">
                                         @if($product->new ==1)
                                            <div class="cat-label">{{__('esas.yeniT')}}</div>
                                        @endif
                                        @if($product->offer ==1)
                                            <div class="cat-label cat-label-offer">Tövsiyə edilir</div>
                                        @endif
                                        <div class="wish-label">
                                            @if(isset($product->getWishlist))
                                                @if(isset($product->getWishlist->where('user_id',$uid)->first()->pr_id) && $product->getWishlist->where('user_id',$uid)->first()->pr_id == $product->id)
                                                    <button onclick="removeFromWish('{{$product->id}}',this)">
                                                        <img src="{{asset('/lucky/images/icon/heart-filled.svg')}}" alt=""
                                                             aria-label="add-to-wishlist"/>
                                                    </button>
                                                    <button class="hidden" onclick="addToWish('{{$product->id}}',this)">
                                                        <img src="{{asset('/lucky/images/icon/heart-outline.svg')}}" alt=""
                                                             aria-label="add-to-wishlist"/>
                                                    </button>
                                                @else
                                                    <button  onclick="addToWish('{{$product->id}}',this)">
                                                        <img src="{{asset('/lucky/images/icon/heart-outline.svg')}}" alt=""
                                                             aria-label="add-to-wishlist"/>
                                                    </button>
                                                    <button class=" hidden"
                                                            onclick="removeFromWish('{{$product->id}}',this)">
                                                        <img src="{{asset('sobsan')}}" alt=""
                                                             aria-label="add-to-wishlist"/>
                                                    </button>
                                                @endif
                                            @else
                                                <button class="addBtn" onclick="addToWish('{{$product->id}}')">
                                                    <img src="{{asset('sobsan')}}" alt=""
                                                         aria-label="add-to-wishlist"/>
                                                </button>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="img-container">
                                        <a href="{{route(__('esas.prDescRoute'),['locale'=>Session('lang'),'slug'=>$product->getPr->where('lang',Session('lang'))->first()->slug])}}"><img
                                                src="{{asset('/public/Products').'/'.$product->blog_img}}"
                                                alt="office-tool"
                                                class="tool-image"/></a>
                                    </div>
                                    <p class="tool-name">@if($product->getPr->where('lang',Session('lang'))->first()->title) {{$product->getPr->where('lang',Session('lang'))->first()->title}} @endif</p>
                                    <span class="tool-price">
                                        {{$product->price}} Azn &nbsp;
                                        @if($product->discount !=0)
                                            <s>{{$product->discount}} Azn</s>
                                        @endif
                                    </span>
                                    <a onclick="addToCart('{{$product->id}}')" class="btn-general"
                                       style="cursor: pointer">{{__('esas.sebeteAt')}}</a>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @include('Sobsan.Components.cartPopUp')

@endsection
@section('additionalJs')
    <script>
        function addToCart($pr) {
            var color_id = $('.colored-radio:checked').attr('id');
            if (color_id == undefined) {
                color_id = $(".colored-radio").first().attr('id');
            }
            var qty = $('.descPrQty').val();
            if (qty >= 1) {
                $.ajax({
                    url: "{{route('storeBasket',['locale'=>Session('lang')])}}",
                    type: 'POST',
                    data: {
                        '_token': "{{ csrf_token() }}",
                        'pr_id': $pr,
                        'descQuantity': qty,
                        'color_id': color_id,
                    },
                    success: function (response) {
                        if (response == 'yox') {
                            $oldQty = $('.qtyCount').text();
                            $('.qtyCount').html(parseInt($oldQty) + 1);
                            $('.qtyCount0').text(parseInt($('.qtyCount0').text()) + 1)
                            $('.qtyCount1').text(parseInt($('.qtyCount1').text()) + 1)
                        }
                        $('.addToCartResponse').css("display", "flex").fadeOut(4000);
                    }
                });
            }
        }

        function decreaseQty(t) {
            $curVal = $(t).next().val();
            if ($curVal > 1) {
                $newVal = parseInt($curVal) - 1;
                $(t).next().val($newVal);
            } else {
                $(t).prev().val(parseInt(1));
            }
        }

        function increaseQty(t) {
            $curVal = $(t).prev().val();
            $newVal = parseInt($curVal) + 1;
            $(t).prev().val($newVal);
        }
    </script>
    <script>
        var checked = $(".colored-radio").first();
        var checkedBg = '2px solid '+checked.css('backgroundColor');
        checked.parent().css({
            'border':checkedBg,
        });

        $(".colored-radio:not(:checked)").click(function () {
            checked.prop('checked', false);
            checked.parent().css('border', '2px solid transparent');
            checked = $(this);
            displayIdChecked();
            checkedBg = '2px solid '+checked.css('backgroundColor');
            if(checked.css('backgroundColor') == 'rgb(255, 255, 255)'){
                checkedBg = '2px solid darkgrey';
            }
            checked.parent().css({
                'border':checkedBg,
            });
        });

        function displayIdChecked() {
            checkedBg = '2px solid '+checked.css('backgroundColor');
            checked.parent().css({
                'border':checkedBg,
            });
        }
    </script>
    <script type="text/javascript" src="{{asset('/lucky/smoothproducts/js/smoothproducts.js')}}?v=9.5"></script>
    <script type="text/javascript">
        $(window).load(function () {
            $('.sp-wrap').smoothproducts();
        });
    </script>
    <script>
        $(window).on('load',function(){
            // if($(".sp-zoom").length) {
            //     $(".sp-large").css("background", "#fff");
            //     $(".sp-large a img").css("visibility", "hidden");
            // } else {
            //     $(".sp-large a img").css("visibility", "visible");
            // }
            var count = $(".sp-thumbs").children().length;
            $('.sp-thumbs').css({width:parseInt(count) * 55+'px'})

            // ==============
            const slider = document.querySelector('.sp-thumbs-wrap');
            let isDown = false;
            let startX;
            let scrollLeft;

            slider.addEventListener('mousedown', (e) => {
                isDown = true;
                slider.classList.add('active');
                startX = e.pageX - slider.offsetLeft;
                scrollLeft = slider.scrollLeft;
            });
            slider.addEventListener('mouseleave', () => {
                isDown = false;
                slider.classList.remove('active');
            });
            slider.addEventListener('mouseup', () => {
                isDown = false;
                slider.classList.remove('active');
            });
            slider.addEventListener('mousemove', (e) => {
                if(!isDown) return;
                e.preventDefault();
                const x = e.pageX - slider.offsetLeft;
                const walk = (x - startX) * 3; //scroll-fast
                slider.scrollLeft = scrollLeft - walk;
                // console.log(walk);
            });
        })


    </script>

    <script>
        function addToCart($pr) {
            var color_id = $('.colored-radio:checked').attr('id');
            if (color_id == undefined) {
                color_id = $(".colored-radio").first().attr('id');
            }
            var qty = $('.descPrQty').val();
            if (qty >= 1) {
                $.ajax({
                    url: "{{route('storeBasket',['locale'=>Session('lang')])}}",
                    type: 'POST',
                    data: {
                        '_token': "{{ csrf_token() }}",
                        'pr_id': $pr,
                        'descQuantity': qty,
                        'color_id': color_id,
                    },
                    success: function (response) {
                        if (response == 'yox') {
                            $oldQty = $('.qtyCount').text();
                            $('.qtyCount').html(parseInt($oldQty) + 1);
                            $('.qtyCount0').text(parseInt($('.qtyCount0').text()) + 1)
                            $('.qtyCount1').text(parseInt($('.qtyCount1').text()) + 1)
                        }
                        $('.addToCartResponse').css("display", "flex").fadeOut(4000);
                    }
                });
            }
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
