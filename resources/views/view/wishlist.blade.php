@extends('layouts.dizayn')
@section('content')
<!-- Title -->
    <title>Lucky | {{__('esas.wishListTitle')}}</title>
    <section id="wishlist">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <header class="page-heading small">
                        <h1>{{__('esas.wishListTitle')}}</h1>
                    </header>
                </div>
                <div class="col-12">
                    <div class="row">
                        @foreach($list as $l)
                            <div class="col-12 col-sm-6 col-lg-4 col-xl-3 d-flex justify-content-center">
                                <div class="tool-box">
                                    <div
                                        class="tool-box-header @if($l->getPrDetails->new == 0 && $l->getPrDetails->offer == 0) justify-content-end @endif">
                                         @if($l->getPrDetails->new ==1)
                                            <div class="cat-label">{{__('esas.yeniT')}}</div>
                                        @endif
                                        @if($l->getPrDetails->offer ==1)
                                            <div class="cat-label cat-label-offer">Tövsiyə edilir</div>
                                        @endif
                                        <div class="wish-label">
                                            <button class="hidden">
                                                <img src="{{asset('/lucky/images/icon/heart-outline.svg')}}" alt=""
                                                     aria-label="add-to-wishlist"/>
                                            </button>
                                            <button class="" onclick="removeFromWish('{{$l->getPrDetails->id}}',this)"><img
                                                    src="{{asset('/lucky/images/icon/heart-filled.svg')}}" alt=""
                                                    aria-label="add-to-wishlist"/></button>
                                        </div>
                                    </div>
                                    <div class="img-container">
                                        <a href="{{route(__('esas.prDescRoute'),['locale'=>Session('lang'),'slug'=>$l->getPrDetails->getPr->where('lang',Session('lang'))->first()->slug])}}">
                                            <img src="{{asset('/public/Products/'.$l->getPrDetails->blog_img)}}"
                                                 alt="office-tool" class="tool-image"/>
                                        </a>
                                    </div>
                                    <p class="tool-name">{{$l->getPrDetails->getPr->where('lang',Session('lang'))->first()->title}}</p>
                                    <span class="tool-price">
                                        {{$l->getPrDetails->price}} Azn &nbsp;
                                        @if($l->getPrDetails->discount >0)
                                            <s>{{$l->getPrDetails->discount}}</s> Azn
                                        @endif
                            </span>
                                    <a onclick="addToCart('{{$l->getPrDetails->id}}')" class="btn-general"
                                       style="cursor: pointer">{{__('esas.sebeteAt')}}</a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
    @include('Sobsan.Components.cartPopUp')
@endsection
@section('additionalJs')
    <script>
        function removeFromWish($pr,t) {
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
                        $('.wishCount0').html(parseInt($('.wishCount0').text()) - 1);
                        $('.wishCount1').html(parseInt($('.wishCount1').text()) - 1);
                        t.parentNode.parentNode.parentNode.parentNode.remove()
                    }
                }
            });
        }

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
                        $('.qtyCount0').text(parseInt($('.qtyCount0').text()) + 1)
                        $('.qtyCount1').text(parseInt($('.qtyCount1').text()) + 1)
                    }
                    $('.addToCartResponse').css("display", "flex").fadeOut(4000);
                }
            });
        }
    </script>
@endsection
