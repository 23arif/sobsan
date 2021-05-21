@extends('layouts.dizayn')
@section('content')
<!-- Title -->
    <title>Lucky | {{__('esas.sebetTitle')}}</title>

    <section id="shopping-cart">
        <div class="container">
            <div class="row">
                @if(Session::has('emptyBasket'))
                    <div class="alert text-center" style="background-color: #fc8410;color: #fff">{{ Session::get('emptyBasket') }}</div>
                @elseif(Session::has('minPrice'))
                    <div class="alert text-center" style="background-color: #fc8410;color: #fff">{{ Session::get('minPrice') }}</div>
                @endif
                @if(\Illuminate\Support\Facades\Auth::user())
                    <div class="col-md-12 col-lg-8">
                        @if(isset($products))
                            <table class="table shopping-cart-table">
                                <thead>
                                <tr>
                                    <th scope="col">&nbsp;</th>
                                    <th scope="col">{{__('esas.mehsulAdi')}}</th>
                                    <th scope="col">{{__('esas.mehsulQiymət')}}</th>
                                    <th scope="col">{{__('esas.mehsulSayi')}}</th>
                                    <th scope="col">{{__('esas.mehsulReng')}}</th>
                                    <th scope="col">{{__('esas.cem')}}</th>
                                    <th scope="col"></th>
                                </tr>
                                </thead>
                                <tbody class="cartBody">
                                @foreach($products as $product)
                                    <tr id="{{$product->pr_id}}">
                                        <td class="product-image">
                                            <a href="{{route(__('esas.prDescRoute'),['locale'=>Session('lang'),'slug'=>$product->getPrDetails->getPr->where('lang',Session('lang'))->first()->slug])}}">
                                                <img
                                                    src="{{asset('/public/Products/'.$product->getPrDetails->blog_img)}}"
                                                    alt="product" style="margin-right: 10px">
                                            </a>
                                        </td>
                                        <td class="product-name"><span class="item-key lg-hidden">{{__('esas.mehsulAdi')}}: </span><span
                                                class="item-value">{{ucfirst($product->getPrDetails->getPr->where('lang',Session('lang'))->first()->title)}}</span>
                                        </td>
                                        <td class="product-price"><span class="item-key lg-hidden">{{__('esas.mehsulQiymət')}}: </span><span
                                                class="amount">{{number_format($product->getPrDetails->price,2)}} AZN</span>
                                        </td>
                                        <td class="product-quantity"><span
                                                class="item-key lg-hidden">{{__('esas.mehsulSayi')}}: </span>
                                            <input type="number" min="1" class="prQty"
                                                   value="{{$product->quantity}}"
                                                   onchange="changeQty(this,'{{$product->getPrDetails->id}}','{{$product->pr_color}}')"></td>
                                        <td class="product-subtotal my-product-total"><span
                                                class="item-key lg-hidden">{{__('esas.mehsulReng')}}: </span>
                                                @if(count($product->getPrDetails->getPrColors))
                                                    <select name="pr_color" id="colorSelect" style="width: 70%;margin:0 auto"
                                                        onchange="changeColor(this,'{{$product->getPrDetails->id}}','{{$product->pr_color}}')">
                                                    @foreach($product->getPrDetails->getPrColors as $color)
                                                        <option value="{{$color->getColors->id}}"
                                                                @if($product->pr_color == $color->getColors->id) selected @endif>
                                                            @if(Session('lang') == 'az')
                                                                {{ucfirst($color->getColors->color_n_az)}}
                                                            @elseif(Session('lang') == 'en')
                                                                {{ucfirst($color->getColors->color_n_en)}}
                                                            @elseif(Session('lang') == 'ru')
                                                                {{ucfirst($color->getColors->color_n_ru)}}
                                                            @endif
                                                        </option>
                                                    @endforeach
                                                </select>
                                                @else
                                                -
                                                @endif
                                        </td>
                                        <td class="product-subtotal my-product-total"><span
                                                class="item-key lg-hidden">{{__('esas.cem')}}: </span>
                                            <span class="item-value totalP">
{{--                                                {{$product->quantity * number_format($product->getPrDetails->price,2)}} AZNnn--}}
                                             {{
                                                number_format($product->quantity *
                                                $product->getPrDetails->price,2)
                                                }}
                                            </span>
                                        </td>
                                        <td class="remove-item">
                                            <button class="btn-general lg-hidden my-product-remove" onclick="removePr('{{$product->pr_id}}','{{$product->pr_color}}',this)">{{__('esas.sil')}}
                                            </button>
                                            <button class="xs-lg-hidden" onclick="removePr('{{$product->pr_id}}','{{$product->pr_color}}',this)">
                                                X
                                            </button>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        @endif
                    </div>
                    <div class="col-md-12 col-lg-4">
                        <div class="cart-info">
                            <h5>{{__('esas.sebetTitle')}}</h5>
                            <hr/>
                            <ul class="price-list">
                                <li class="price-list-item"><span class="name">{{__('esas.cem')}}</span>
                                    <span class="price totalPrice">
                                        {{number_format($totalPrice,2)}} Azn
                                    </span></li>
                            </ul>
                            <a href="{{route(__('esas.sifarisRoute'),['locale'=>Session('lang')])}}"
                               class="btn-general orange">{{__('esas.sifarisiTestiqle')}}</a>
                        </div>
                    </div>
                @else
                    <div class="col-md-12 col-lg-8">
                        <table class="table shopping-cart-table"></table>
                        @if(isset($products))
                            <table class="table shopping-cart-table">
                                <thead>
                                <tr>
                                    <th scope="col">&nbsp;</th>
                                    <th scope="col">{{__('esas.mehsulAdi')}}</th>
                                    <th scope="col">{{__('esas.mehsulQiymət')}}</th>
                                    <th scope="col">{{__('esas.mehsulSayi')}}</th>
                                    <th scope="col">{{__('esas.mehsulReng')}}</th>
                                    <th scope="col">{{__('esas.cem')}}</th>
                                    <th scope="col"></th>
                                </tr>
                                </thead>
                                <tbody class="cartBody">
                                @foreach($products as $product)
                                    <tr id="{{$product->pr_id}}">
                                        <td class="product-image">
                                            <a href="{{route(__('esas.prDescRoute'),['locale'=>Session('lang'),'slug'=>$product->getPrDetails->getPr->where('lang',Session('lang'))->first()->slug])}}">
                                                <img
                                                    src="{{asset('/public/Products/'.$product->getPrDetails->blog_img)}}"
                                                    alt="product" style="margin-right: 10px">
                                            </a>
                                        </td>
                                        <td class="product-name"><span class="item-key lg-hidden">{{__('esas.mehsulAdi')}}: </span><span
                                                class="item-value">{{ucfirst($product->getPrDetails->getPr->first()->title)}}</span>
                                        </td>
                                        <td class="product-price"><span class="item-key lg-hidden">{{__('esas.mehsulQiymət')}}: </span><span
                                                class="amount">{{number_format($product->getPrDetails->price,2)}} AZN</span>
                                        </td>
                                        <td class="product-quantity"><span
                                                class="item-key lg-hidden">{{__('esas.mehsulSayi')}}: </span>
                                            <input type="number" min="1" class="prQty"
                                                   value="{{$product->quantity}}"
                                                   onchange="changeQty(this,'{{$product->getPrDetails->id}}','{{$product->pr_color}}')"></td>
                                        <td class="product-subtotal my-product-total"><span
                                                class="item-key lg-hidden">{{__('esas.mehsulReng')}}: </span>
                                                @if(count($product->getPrDetails->getPrColors))
                                            <select name="pr_color" id="colorSelect" style="width: 70%;margin:0 auto"
                                                    onchange="changeColor(this,'{{$product->getPrDetails->id}}','{{$product->pr_color}}')">
                                                @foreach($product->getPrDetails->getPrColors as $k =>$color)
                                                    <option value="{{$color->getColors->id}}"
                                                            @if($product->pr_color == $color->getColors->id) selected @endif>
                                                        @if(Session('lang') == 'az')
                                                            {{ucfirst($color->getColors->color_n_az)}}
                                                        @elseif(Session('lang') == 'en')
                                                            {{ucfirst($color->getColors->color_n_en)}}
                                                        @elseif(Session('lang') == 'ru')
                                                            {{ucfirst($color->getColors->color_n_ru)}}
                                                        @endif
                                                    </option>
                                                @endforeach
                                            </select>
                                            @else
                                            -
                                            @endif
                                        </td>
                                        <td class="product-subtotal my-product-total"><span
                                                class="item-key lg-hidden">{{__('esas.cem')}}: </span>
                                            <span class="item-value totalP">

                                                {{
                                                number_format($product->quantity *
                                                $product->getPrDetails->price,2)
                                                }}

                                                 AZN </span>
                                        </td>
                                        <td class="remove-item">
                                            <button class="btn-general lg-hidden my-product-remove" onclick="removePr('{{$product->pr_id}}','{{$product->pr_color}}',this)">{{__('esas.sil')}}
                                            </button>
                                            <button class="xs-lg-hidden" onclick="removePr('{{$product->pr_id}}','{{$product->pr_color}}',this)">
                                                X
                                            </button>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        @endif
                    </div>
                    <div class="col-md-12 col-lg-4">
                        <div class="cart-info">
                            <h5>{{__('esas.sebetTitle')}}</h5>
                            <hr/>
                            <ul class="price-list">
                                <li class="price-list-item"><span class="name">{{__('esas.cem')}}</span>
                                    <span class="price totalPrice">
                                        {{number_format($totalPrice,2)}} Azn
                                    </span></li>
                            </ul>
                            <a href="{{route(__('esas.sifarisRoute'),['locale'=>Session('lang')])}}"
                               class="btn-general orange text-center">{{__('esas.sifarisiTestiqle')}}</a>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </section>
    <section id="reletedPr-carousel" class="lg-show">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <header class="sec-heading">
                        <h1>{{__('esas.endirimTitle')}}</h1>
                    </header>
                </div>
                <div id="discount">
                    <div class="col-12">
                        <div class="owl-carousel owl-theme">
                            @foreach($allDiscounts as $discount)
                                <div class="tool-box item">
                                    <div
                                        class="tool-box-header @if($discount->new == 0 && $discount->offer == 0) justify-content-end @endif">
                                        @if($discount->new ==1)
                                            <div class="cat-label">{{__('esas.yeniT')}}</div>
                                        @endif
                                        @if($discount->offer ==1)
                                            <div class="cat-label cat-label-offer">Tövsiyə edilir</div>
                                        @endif
                                        <div class="wish-label">
                                            @if(isset($discount->getWishlist))
                                                @if(isset($discount->getWishlist->where('user_id',$uid)->first()->pr_id) && $discount->getWishlist->where('user_id',$uid)->first()->pr_id == $discount->id)
                                                    <button onclick="removeFromWish('{{$discount->id}}',this)">
                                                        <img src="{{asset('/lucky/images/icon/heart-filled.svg')}}"
                                                             alt=""
                                                             aria-label="add-to-wishlist"/>
                                                    </button>
                                                    <button class="hidden" onclick="addToWish('{{$discount->id}}',this)">
                                                        <img src="{{asset('/lucky/images/icon/heart-outline.svg')}}"
                                                             alt=""
                                                             aria-label="add-to-wishlist"/>
                                                    </button>
                                                @else
                                                    <button onclick="addToWish('{{$discount->id}}',this)">
                                                        <img src="{{asset('/lucky/images/icon/heart-outline.svg')}}"
                                                             alt=""
                                                             aria-label="add-to-wishlist"/>
                                                    </button>
                                                    <button class=" hidden"
                                                            onclick="removeFromWish('{{$discount->id}}',this)">
                                                        <img src="{{asset('/lucky/images/icon/heart-filled.svg')}}"
                                                             alt=""
                                                             aria-label="add-to-wishlist"/>
                                                    </button>
                                                @endif
                                            @else
                                                <button class="addBtn" onclick="addToWish('{{$discount->id}}')">
                                                    <img src="{{asset('/lucky/images/icon/heart-outline.svg')}}" alt=""
                                                         aria-label="add-to-wishlist"/>
                                                </button>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="img-container">
                                        <a href="{{route(__('esas.prDescRoute'),['locale'=>Session('lang'),'slug'=>$discount->getPr->where('lang',Session('lang'))->first()->slug])}}"><img
                                                src="{{asset('/public/Products').'/'.$discount->blog_img}}"
                                                alt="office-tool"
                                                class="tool-image"/></a>
                                    </div>
                                    <p class="tool-name">@if($discount->getPr->where('lang',Session('lang'))->first()->title) {{$discount->getPr->where('lang',Session('lang'))->first()->title}} @endif</p>
                                    <span class="tool-price">
                                        {{$discount->price}} Azn &nbsp;
                                        @if($discount->discount !=0)
                                            <s>{{$discount->discount}} Azn</s>
                                        @endif
                                    </span>
                                    <a onclick="addToCart('{{$discount->id}}')" class="btn-general"
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
    <!--<button id="init" style="display: none"></button>-->
@endsection
@section('additionalJs')
    <script src="{{asset('/lucky/js/jquery.simplecolorpicker.js')}}?v=1.0"></script>
    <script>

        function addToCart($pr) {
            $.ajax({
                url: "{{route('storeBasket',['locale'=>Session('lang')])}}",
                type: 'POST',
                data: {
                    '_token': "{{ csrf_token() }}",
                    'pr_id': $pr,
                    'quantity': 1,
                    'type':'discountPr'
                },
                success: function (response) {
                    if (response.yox == 'yox') {
                        $oldQty = $('.qtyCount').text();
                        $('.qtyCount').text(parseInt($oldQty) + 1);
                        $('.qtyCount0').text(parseInt($('.qtyCount0').text()) + 1);
                        $('.qtyCount1').text(parseInt($('.qtyCount1').text()) + 1);
                        $('.cartBody').append(response.item);
                    }else{
                        $oldVal = $('#'+response.pr_id).find('.prQty').val();
                        $('#'+response.pr_id).find('.prQty').val(parseInt($oldVal)+1);
                        $('#'+response.pr_id).find('.totalP').html((parseFloat($('#'+response.pr_id).find('.amount').html()) * (parseInt($oldVal)+1)).toFixed(2) + ' Azn');
                    }
                    $('.addToCartResponse').css("display", "flex").fadeOut(4000);
                    $('.totalPrice').html(response.totalPrice.toFixed(2) + ' Azn');
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

        function removePr($pr,$prcolor, t) {
            $.ajax({
                url: "{{route('destroyBasket',['locale'=>Session('lang')])}}",
                type: 'POST',
                data: {
                    '_token': "{{ csrf_token() }}",
                    'pr_id': $pr,
                    'pr_color': $prcolor,
                },
                success: function (response) {
                    if (response.ok == 'ok') {
                        $(t).closest('tr').remove();
                        $oldQty = $('.qtyCount').text();
                        $('.qtyCount').html(parseInt($oldQty) - 1);
                        $('.qtyCount0').text(parseInt($('.qtyCount0').text()) - 1)
                        $('.qtyCount1').text(parseInt($('.qtyCount1').text()) - 1)
                        $('.totalPrice').html(response.totalPrice.toFixed(2) + ' Azn');
                    }
                }
            });
        }

        function changeQty(t, prId,prcolor) {
            $.ajax({
                url: "{{route('updateBasket',['locale'=>Session('lang')])}}",
                type: 'POST',
                data: {
                    '_token': "{{ csrf_token() }}",
                    'pr_id': prId,
                    'pr_color': prcolor,
                    'qty': $(t).val(),
                },
                success: function (response) {
                    if (response.ok == 'ok') {
                        $result = parseInt($(t).val()) * parseFloat($(t).closest('tr').find('.amount').html().replace(/[^\d.-]/g, ''));
                        // console.log(parseFloat($(t).parent().prev().find('.amount').html());
                        // console.log();
                        // console.log($result);
                        $(t).parent().next().next().find('.totalP').html(parseFloat($result).toFixed(2) + ' Azn');
                        $('.totalPrice').html(response.totalPrice.toFixed(2) + ' Azn');
                    }
                }
            });
        }

        function changeColor(t, prId,currentPrColor) {
            $.ajax({
                url: "{{route('updateBasket',['locale'=>Session('lang')])}}",
                type: 'POST',
                data: {
                    '_token': "{{ csrf_token() }}",
                    'pr_id': prId,
                    'chgColor': 'yes',
                    'pr_color': $(t).val(),
                    'pr_qty':$(t).parent().prev().find('.prQty').val(),
                    'current_pr_color': currentPrColor
                },
                success: function (response) {
                    if (response.colorChged == 'ok') {
                        $(t).closest('tr').remove();
                        $('#'+prId+' .prQty').val(parseInt($('#'+prId+' .prQty').val())+parseInt(response.oldPrQty));
                        $oldQty = $('.qtyCount').text();
                        $('.qtyCount').html(parseInt($oldQty) - 1);
                        $('.qtyCount0').text(parseInt($('.qtyCount0').text()) - 1)
                        $('.qtyCount1').text(parseInt($('.qtyCount1').text()) - 1)
                        $('.totalPrice').html(response.totalPrice.toFixed(2) + ' Azn');
                    }
                }
            });
        }
    </script>
    <script>
        $(document).ready(function () {
            $('#init').on('click', function () {
                $('select[name="pr_color"]').simplecolorpicker({picker: true, theme: 'glyphicons'});
            });

            // By default, activate simplecolorpicker plugin on HTML selects
            $('#init').trigger('click');
        });
    </script>
@endsection
