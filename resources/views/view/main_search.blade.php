@extends('layouts.dizayn')
@section('content')
    <!-- Title -->
    <title>Lucky | {{__('esas.axtaris')}}</title>

    <section id="wishlist">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <header class="sec-heading">
                        <h1>{{__('esas.axtaris')}}</h1>
                    </header>
                    @if(isset($message))
                        <p class="alert text-center" style="background-color: #fc8410;color: #fff">{{$message}}</p>
                    @endif
                </div>
                <div class="col-12">
                    <div class="row">
                        @if(isset($products))
                            @foreach($products as $product)
                                @if(isset($product->getPrId->destroy) && $product->getPrId->destroy == 0 && $product->getPrId->active == 1)
                                <div class="col-12 col-md-6 col-lg-4 col-xl-3 d-flex justify-content-center">
                                    <div class="tool-box">
                                        <div
                                            class="tool-box-header @if($product->getPrId->new == 0 && $product->getPrId->offer == 0) justify-content-end @endif">
                                            @if($product->getPrId->new ==1)
                                                <div class="cat-label">{{__('esas.yeniT')}}</div>
                                            @endif
                                            @if($product->getPrId->offer ==1)
                                                <div class="cat-label cat-label-offer">Tövsiyə edilir</div>
                                            @endif
                                            <div class="wish-label">
                                                @if(isset($product->getPrId->getWishlist))
                                                    @if(isset($product->getPrId->getWishlist->where('user_id',$uid)->first()->pr_id) && $product->getPrId->getWishlist->where('user_id',$uid)->first()->pr_id == $product->getPrId->id)
                                                        <button onclick="removeFromWish('{{$product->getPrId->id}}',this)">
                                                            <img src="{{asset('/lucky/images/icon/heart-filled.svg')}}" alt=""
                                                                 aria-label="add-to-wishlist"/>
                                                        </button>
                                                        <button class="hidden" onclick="addToWish('{{$product->getPrId->id}}',this)">
                                                            <img src="{{asset('/lucky/images/icon/heart-outline.svg')}}" alt=""
                                                                 aria-label="add-to-wishlist"/>
                                                        </button>
                                                    @else
                                                        <button  onclick="addToWish('{{$product->getPrId->id}}',this)">
                                                            <img src="{{asset('/lucky/images/icon/heart-outline.svg')}}" alt=""
                                                                 aria-label="add-to-wishlist"/>
                                                        </button>
                                                        <button class=" hidden"
                                                                onclick="removeFromWish('{{$product->getPrId->id}}',this)">
                                                            <img src="{{asset('/lucky/images/icon/heart-filled.svg')}}" alt=""
                                                                 aria-label="add-to-wishlist"/>
                                                        </button>
                                                    @endif
                                                @else
                                                    <button class="addBtn" onclick="addToWish('{{$product->getPrId->id}}')">
                                                        <img src="{{asset('/lucky/images/icon/heart-outline.svg')}}" alt=""
                                                             aria-label="add-to-wishlist"/>
                                                    </button>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="img-container">
                                            <a href="{{route(__('esas.prDescRoute'),['locale'=>Session('lang'),'slug'=>$product->slug])}}"><img
                                                    src="{{asset('/public/Products').'/'.$product->getPrId->blog_img}}"
                                                    alt="office-tool"
                                                    class="tool-image"/></a>
                                        </div>
                                        @if(!empty($product->title))
                                            <p class="tool-name">{{ucfirst($product->title)}}</p>
                                        @endif
                                        <span class="tool-price">
                                                                {{$product->getPrId->price}} Azn &nbsp;
                                                                @if($product->getPrId->discount !=0)
                                                <s>{{$product->getPrId->discount}} Azn</s>
                                            @endif

                                                            </span>
                                        <a onclick="addToCart('{{$product->getPrId->id}}')" class="btn-general"
                                       style="cursor: pointer">{{__('esas.sebeteAt')}}</a>
                                    </div>
                                </div>
                                @endif
                            @endforeach
                            @if(!count($products))
                                <p class="alert text-center"
                                   style="background-color: #fc8410;color: #fff">{{__('esas.msearchNotResult')}}</p>
                            @endif
                        @endif
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
@endsection
