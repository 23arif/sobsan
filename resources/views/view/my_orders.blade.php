@extends('layouts.dizayn')
@section('content')
    <!-- Title -->
    <title>Lucky | {{__('esas.sifarislerimT')}}</title>
    <section id="my-order">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <header class="page-heading">
                        <h1>{{__('esas.sifarislerimT')}}</h1>
                        <p><a href="{{route('homepage',['locale'=>Session('lang')])}}">{{__('esas.anasehve')}}</a> /
                            <a>{{__('esas.sifarislerimT')}}</a></p>
                    </header>
                </div>
            </div>
            <div class="row">

            <div class="col-12">
                <div class="order-tabs">
                    <button href="#" class="tab tab-1 @if($lastOrderSort == 1) active @endif">Fərdi sifarişlər</button>
                    <button href="#" class="tab tab-2 @if($lastOrderSort == 2) active @endif">Paket sifarişlər</button>
                </div>
            </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="order-filter-block">
                        <form action="" class="row" method="get" id="filterOrder">
                            <div class="col-12 col-lg-6 d-flex align-items-center">
                                <div class="order-filter-date">
                                    <span>{{__('esas.tarixeGore')}}: </span>
                                    <select name="tarixFilter" onchange="$('#filterOrder').submit()">
                                        <option value="0"
                                                @if(isset($_GET['tarixFilter']) && $_GET['tarixFilter'] == 0) selected @endif>{{__('esas.tezedenKohneye')}}</option>
                                        <option value="1"
                                                @if(isset($_GET['tarixFilter']) && $_GET['tarixFilter'] == 1) selected @endif>{{__('esas.kohnedenTezeye')}}</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-12 col-lg-6 d-flex align-items-center">
                                <div class="order-filter-status">
                                    <span>{{__('esas.statusaGore')}} : </span>
                                    <select name="statusFilter" onchange="$('#filterOrder').submit()">
                                        <option value=""
                                                @if(isset($_GET['statusFilter']) && $_GET['statusFilter'] == '') selected @endif >{{__('esas.StatusHamisi')}}</option>
                                        <option value="1"
                                                @if(isset($_GET['statusFilter']) && $_GET['statusFilter'] == 1) selected @endif>{{__('esas.StatusCatdirilib')}}</option>
                                        <option value="0"
                                                @if(isset($_GET['statusFilter']) && $_GET['statusFilter'] == 0) selected @endif>{{__('esas.StatusGozleyir')}}</option>
                                    </select>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="row single-order">
                <div class="col-12">
                    <div class="my-order-container">
                        <div class="row">
                            <div class="col-12">
                                <div class="order-item item-head xs-lg-hidden">
                                    <div class="row">
                                        <div
                                            class="col-lg-2 d-flex align-items-center justify-content-center order-image">
                                            <p>Şəkil</p>
                                        </div>
                                        <div
                                            class="col-lg-2 d-flex align-items-center justify-content-center order-name">
                                            <p>{{__('esas.mehsulAdi')}}</p>
                                        </div>
                                        <div
                                            class="col-lg d-flex align-items-center justify-content-center order-quantity">
                                            <p>{{__('esas.mehsulSayi')}}</p>
                                        </div>
                                        <div
                                            class="col-lg d-flex align-items-center justify-content-center order-quantity">
                                            <p>{{__('esas.mehsulReng')}}</p>
                                        </div>
                                        <div
                                            class="col-lg d-flex align-items-center justify-content-center order-price">
                                            <p>{{__('esas.mehsulQiymət')}}</p>
                                        </div>
                                        <div
                                            class="col-lg d-flex align-items-center justify-content-center order-price">
                                            <p>{{__('esas.Tarix')}}</p>
                                        </div>
                                        <div
                                            class="col-lg d-flex align-items-center justify-content-center order-status">
                                            <p>{{__('esas.Status')}}</p>
                                        </div>
                                        <div
                                            class="col-lg-2 d-flex align-items-center justify-content-center order-again">
                                            <p>{{__('esas.tekrarSifaris')}}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @foreach($myOrders as $order)
                                @if(count(json_decode($order->orders)) == 1)
                                    @foreach(json_decode($order->orders) as $singleOrder)
                                        <div class="col-12">
                                            <div class="order-item">
                                                <div class="row">
                                                    <div
                                                        class="col-12 col-lg-2 d-flex align-items-center justify-content-center order-image">
                                                        <a href="{{route(__('esas.prDescRoute'),['locale'=>Session('lang'),'slug'=>$singleOrder->slug])}}">
                                                            <img
                                                                src="{{asset('/public/Products/'.$singleOrder->blog_img)}}"
                                                                alt="{{\App\PrDesc::where(['pr_id'=>$singleOrder->pr_id,'lang'=>Session('lang')])->first()->title}}">
                                                        </a>
                                                    </div>
                                                    <div
                                                        class="col-12 col-lg-2 d-flex align-items-center justify-content-center order-name">
                                                        <span class="lg-hidden">{{__('esas.mehsulAdi')}}</span>
                                                        <p>{{\App\PrDesc::where(['pr_id'=>$singleOrder->pr_id,'lang'=>Session('lang')])->first()->title}}</p>
                                                    </div>
                                                    <div
                                                        class="col-12 col-lg d-flex align-items-center justify-content-center order-quantity">
                                                        <span class="lg-hidden">{{__('esas.mehsulSayi')}}</span>
                                                        <p>{{$singleOrder->quantity}}</p>
                                                    </div>
                                                    <div
                                                        class="col-12 col-lg d-flex align-items-center justify-content-center order-quantity">
                                                        <span class="lg-hidden">{{__('esas.mehsulReng')}}</span>
                                                        <p>
                                                            @if(isset($singleOrder->pr_color))
                                                                @if(Session('lang')=='az')
                                                                    {{\App\Colors::where('id',$singleOrder->pr_color)->first()->color_n_az}}
                                                                @elseif(Session('lang')=='en')
                                                                    {{\App\Colors::where('id',$singleOrder->pr_color)->first()->color_n_en}}
                                                                @elseif(Session('lang')=='ru')
                                                                    {{\App\Colors::where('id',$singleOrder->pr_color)->first()->color_n_ru}}
                                                                @endif
                                                            @else
                                                                -
                                                            @endif
                                                        </p>
                                                    </div>
                                                    <div
                                                        class="col-12 col-lg d-flex align-items-center justify-content-center order-price">
                                                        <span class="lg-hidden">{{__('esas.mehsulQiymət')}}</span>
                                                        <p>{{number_format($singleOrder->price,2)}} Azn</p>
                                                    </div>
                                                    <div
                                                        class="col-12 col-lg d-flex align-items-center justify-content-center order-date">
                                                        <span class="lg-hidden">{{__('esas.Tarix')}}</span>
                                                        <p>{{date('d M Y',strtotime($order->order_date))}}</p>
                                                    </div>
                                                    <div
                                                        class="col-12 col-lg d-flex align-items-center justify-content-center order-status">
                                                        <span class="lg-hidden">{{__('esas.Status')}} </span>
                                                        @if($order->order_status == 0)
                                                            <p class="status-2">{{__('esas.StatusGozleyir')}}</p>
                                                        @else
                                                            <p class="status-1">{{__('esas.StatusCatdirilib')}}</p>
                                                        @endif

                                                    </div>
                                                    <div
                                                        class="col-12 col-lg-2 d-flex align-items-center justify-content-center order-again">
                                                        <button class="btn-general" name="order-again"
                                                                onclick="addToCart('{{$order->id}}')">{{__('esas.tekrarSifaris')}}
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                @endif
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
            <div class="row multi-order">
                                <div class="col-12">
                                    <div class="my-order-container">
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="order-item item-head xs-lg-hidden">
                                                    <div class="row">
                                                        <div
                                                            class="col-lg-1 d-flex align-items-center justify-content-center order-image">
                                                            <p>#</p>
                                                        </div>
                                                        <div
                                                            class="col-lg-3 d-flex align-items-center justify-content-center order-name">
                                                            <p>Paket adı</p>
                                                        </div>
                                                        <div
                                                            class="col-lg d-flex align-items-center justify-content-center order-price">
                                                            <p>Qiymət</p>
                                                        </div>
                                                        <div
                                                            class="col-lg d-flex align-items-center justify-content-center order-price">
                                                            <p>Tarix</p>
                                                        </div>
                                                        <div
                                                            class="col-lg d-flex align-items-center justify-content-center order-status">
                                                            <p>Status</p>
                                                        </div>
                                                        <div
                                                            class="col-lg-2 d-flex align-items-center justify-content-center order-again">
                                                            <p>Təkrar sifariş</p>
                                                        </div>
                                                        <div
                                                            class="col-lg-1 d-flex align-items-center justify-content-center order-again">
                                                            <p>#</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                            @foreach($myOrders as $order)
                                @if(count(json_decode($order->orders)) > 1)
                                <div class="col-12 multi-order-outer">
                                        <div class="order-item">
                                            <div class="row">
                                                <div
                                                    class="col-12 col-lg-1 d-flex align-items-center justify-content-center order-image">
                                                    <i class="fa fa-shopping-cart"
                                                       aria-hidden="true"></i>
                                                </div>
                                                <div
                                                    class="col-12 col-lg-3 d-flex align-items-center justify-content-center order-name">
                                                    <span class="lg-hidden">Adı:</span>
                                                    <p>Səbət {{$order->order_no}}</p>
                                                </div>
                                                <div
                                                    class="col-12 col-lg d-flex align-items-center justify-content-center order-price">
                                                    <span class="lg-hidden">Qiyməti:</span>
                                                    <p>{{number_format($order->total_price,2)}} Azn</p>
                                                </div>
                                                <div
                                                    class="col-12 col-lg d-flex align-items-center justify-content-center order-date">
                                                    <span class="lg-hidden">Tarixi:</span>
                                                    <p>{{date('d M Y',strtotime($order->order_date))}}</p>
                                                </div>
                                                <div
                                                    class="col-12 col-lg d-flex align-items-center justify-content-center order-status">
                                                    <span class="lg-hidden">Statusu: </span>
                                                     @if($order->order_status == 0)
                                                        <p class="status-2">{{__('esas.StatusGozleyir')}}</p>
                                                    @else
                                                        <p class="status-1">{{__('esas.StatusCatdirilib')}}</p>
                                                    @endif
                                                    <i class="fa fa-question-circle text-info" style="margin-left:5px" aria-hidden="true"  data-bs-toggle="tooltip" data-bs-placement="right" title="Sifarişi ləğv etmək üçün əlaqə saxlayın: (994) 99 832 07 77"></i>
                                                </div>
                                                <div
                                                    class="col-12 col-lg-2 d-flex align-items-center justify-content-center order-again">
                                                     <button class="btn-general" name="order-again"
                                                            onclick="addToCart('{{$order->id}}')">{{__('esas.tekrarSifaris')}}
                                                    </button>
                                                </div>
                                                <div
                                                    class="col-12 col-lg-1 d-flex align-items-center justify-content-center order-expand">
                                                    <i class="fa fa-angle-double-down"
                                                       aria-hidden="true"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-12 multi-order-inner">
                                        <div class="my-order-container">
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="order-item item-head xs-lg-hidden">
                                                        <div class="row">
                                                            <div
                                                                class="col-lg-2 d-flex align-items-center justify-content-center order-image">
                                                                <p>Şəkil</p>
                                                            </div>
                                                            <div
                                                                class="col-lg-3 d-flex align-items-center justify-content-center order-name">
                                                                <p>{{__('esas.mehsulAdi')}}</p>
                                                            </div>
                                                            <div
                                                                class="col-lg d-flex align-items-center justify-content-center order-quantity">
                                                                <p>{{__('esas.mehsulSayi')}}</p>
                                                            </div>
                                                            <div
                                                                class="col-lg d-flex align-items-center justify-content-center order-price">
                                                                <p>{{__('esas.mehsulReng')}}</p>
                                                            </div>
                                                            <div
                                                                class="col-lg d-flex align-items-center justify-content-center order-price">
                                                                <p>{{__('esas.mehsulQiymət')}}</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                @foreach(json_decode($order->orders) as $singleOrder)
                                                <div class="col-12">
                                                    <div class="order-item">
                                                        <div class="row">
                                                            <div
                                                                class="col-12 col-lg-2 d-flex align-items-center justify-content-center order-image">
                                                                <a href="{{route(__('esas.prDescRoute'),['locale'=>Session('lang'),'slug'=>$singleOrder->slug])}}">
                                                                    <img
                                                                        src="{{asset('/public/Products/'.$singleOrder->blog_img)}}"
                                                                        alt="{{\App\PrDesc::where(['pr_id'=>$singleOrder->pr_id,'lang'=>Session('lang')])->first()->title}}">
                                                                </a>
                                                            </div>
                                                            <div
                                                                class="col-12 col-lg-3 d-flex align-items-center justify-content-center order-name">
                                                                <span class="lg-hidden">{{__('esas.mehsulAdi')}}:</span>
                                                                <p>{{\App\PrDesc::where(['pr_id'=>$singleOrder->pr_id,'lang'=>Session('lang')])->first()->title}}</p>
                                                            </div>
                                                            <div
                                                                class="col-12 col-lg d-flex align-items-center justify-content-center order-quantity">
                                                                <span class="lg-hidden">{{__('esas.mehsulSayi')}}:</span>
                                                                <p>{{$singleOrder->quantity}}</p>
                                                            </div>
                                                            <div
                                                                    class="col-12 col-lg d-flex align-items-center justify-content-center order-quantity">
                                                                    <span
                                                                        class="lg-hidden">{{__('esas.mehsulReng')}}:</span>
                                                                    <p class="text-center">
                                                                        @if(isset($singleOrder->pr_color))
                                                                            @if(Session('lang')=='az')
                                                                                {{\App\Colors::where('id',$singleOrder->pr_color)->first()->color_n_az}}
                                                                            @elseif(Session('lang')=='en')
                                                                                {{\App\Colors::where('id',$singleOrder->pr_color)->first()->color_n_en}}
                                                                            @elseif(Session('lang')=='ru')
                                                                                {{\App\Colors::where('id',$singleOrder->pr_color)->first()->color_n_ru}}
                                                                            @endif
                                                                        @else
                                                                            -
                                                                        @endif
                                                                    </p>
                                                                </div>
                                                            <div
                                                                class="col-12 col-lg d-flex align-items-center justify-content-center order-price">
                                                                <span class="lg-hidden">{{__('esas.mehsulQiymət')}}:</span>
                                                                <p>{{number_format($singleOrder->price,2)}} Azn</p>
                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>





                                @endif
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
            <!--<div class="row">-->
            <!--    <p class="alert-warning alert">Sifarişi ləğv etmək üçün bizimlə əlaqə saxlayın.</p>-->
            <!--</div>-->
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
                    'orderAgain': 'yes',
                },
                success: function (response) {
                    if (response.check == 'yox') {
                        $oldQty = $('.qtyCount').text();
                        $('.qtyCount').html(parseInt($oldQty) + parseInt(response.qty));
                        $('.qtyCount0').text(parseInt($('.qtyCount0').text()) + 1);
                        $('.qtyCount1').text(parseInt($('.qtyCount1').text()) + 1);
                    }
                    $('.addToCartResponse').css("display", "flex").fadeOut(4000);
                    window.location.href = "{{route(__('esas.sebetRoute'),['locale'=>Session('lang')])}}";
                }
            });
        }
    </script>
@endsection
