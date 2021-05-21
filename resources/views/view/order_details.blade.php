@extends('layouts.dizayn')
@section('content')
<!-- Title -->
    <title>Lucky | {{__('esas.melumatlar')}}</title>
    @if(\Illuminate\Support\Facades\Auth::user())
        <section id="order-info">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <header>
                            <h3 class="order-heading text-center">{{__('esas.melumatlar')}}</h3>
                        </header>
                    </div>
                    <div class="col-12">
                        @if(Session::has('sifarisE'))
                            <div class="alert text-center"
                                 style="background-color: #fc8410;color: #fff">{{ Session::get('sifarisE') }}</div>
                        @endif
                    </div>
                    <div class="col-12 col-lg-7">
                        <div class="form-wrapper">
                            <form id="order-form" action="{{route('sifarisEt',['locale'=>Session('lang')])}}"
                                  method="post">
                                @csrf
                                <div class="form-group">
                                    <label for="company-name">Şirkət adı *</label>
                                    <input type="text" class="form-control" id="company-name"
                                           placeholder="Şirkət adı *"
                                           value="{{\Illuminate\Support\Facades\Auth::user()->company_name}}" required
                                           name="companyName" disabled/>
                                </div>
                                <div class="form-group">
                                    <label for="fullname">{{__('esas.adSoyad')}}*</label>
                                    <input type="text" class="form-control" id="fullname"
                                           placeholder="{{__('esas.adSoyad')}}"
                                           value="{{\Illuminate\Support\Facades\Auth::user()->name}}" required
                                           name="name"/>
                                </div>
                                <div class="form-group">
                                    <label for="address">{{__('esas.unvan')}}*</label>
                                    <input type="text" class="form-control" id="address"
                                           placeholder="{{__('esas.unvan')}}" required
                                           value="{{\Illuminate\Support\Facades\Auth::user()->address}}" name="unvan"/>
                                </div>
                                <div class="form-group">
                                    <label for="address">{{__('esas.seher')}}*</label>
                                    <input type="text" class="form-control" id="city"
                                           placeholder="{{__('esas.seher')}}" required
                                           value="Bakı" name="city" disabled/>
                                </div>
                                <div class="form-group">
                                    <label for="tel">{{__('esas.telefon')}}*</label>
                                    <input type="tel" class="form-control" id="tel" placeholder="{{__('esas.telefon')}}"
                                           required value="{{\Illuminate\Support\Facades\Auth::user()->telefon}}"
                                           name="telefon"/>
                                </div>
                                <div class="form-group">
                                    <label for="e-mail">{{__('esas.email')}}*</label>
                                    <input type="email" class="form-control" id="e-mail"
                                           placeholder="{{__('esas.email')}}" required
                                           value="{{\Illuminate\Support\Facades\Auth::user()->email}}" name="email"/>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="col-12 col-lg-5">
                        <div class="order-info-wrapper">
                            <div class="cart-info">
                                <h4 style="text-transform:unset">{{__('esas.sifaris')}}</h4>
                                <hr/>
                                <ul class="price-list">
                                    <li class="price-list-item"><span class="name">{{__('esas.cem')}}</span><span
                                            class="price">{{number_format($totalPrice,2)}} Azn</span></li>
                                    <li class="price-list-item"><span class="name">{{__('esas.catdirilma')}}</span><span
                                            class="price">{{number_format($delivery,2)}} Azn</span></li>
                                    <li class="price-list-item"><span class="name">Ümumi</span><span
                                    class="price">{{number_format($delivery+$totalPrice,2)}} Azn</span></li>
                                </ul>
                            </div>
                             <div class="cart-info">
                                <form id="orderTypeForm">
                                    <div class="order-type-item">
                                        <label for="individual">Individual</label>
                                        <input class="form-check-input" type="radio" name="orderType" id="individual" value="0"
                                               checked>
                                    </div>
                                    <div class="order-type-item">
                                        <label for="corporative">Corporative</label>
                                        <input class="form-check-input" type="radio" name="orderType" value="1"
                                               id="corporative">
                                    </div>
                                </form>
                            </div>
                            <div class="mt-3" style="">
                               <p class="text-info" style="font-size:17px"><i class="fa fa-info-circle" aria-hidden="true"></i> Qeyd: Qiymətlərə ƏDV daxildir.</p>
                            </div>
                            <button type="submit" href="#" id="btn-confirm" form="order-form"
                                    class="btn-general orange">{{__('esas.sifarisiTestiqle')}}</button>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @else
        <section id="order-info">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <header>
                            <h3 class="order-heading text-center">{{__('esas.melumatlar')}}</h3>
                        </header>
                    </div>
                    <div class="col-12">
                        @if(Session::has('sifarisE'))
                            <div class="alert text-center"
                                 style="background-color: #fc8410;color: #fff">{{ Session::get('sifarisE') }}</div>
                        @endif
                    </div>
                    <div class="col-12 col-lg-7">
                        <div class="form-wrapper">
                            <form id="order-form" action="{{route('sifarisEt',['locale'=>Session('lang')])}}"
                                  method="post">
                                @csrf
                                <div class="form-group">
                                    <label for="company-name">Şirkət adı *</label>
                                    <input type="text" class="form-control" id="company-name"
                                           placeholder="Şirkət adı *"
                                           value="" required
                                           name="companyName"/>
                                </div>
                                <div class="form-group">
                                    <label for="fullname">{{__('esas.adSoyad')}}*</label>
                                    <input type="text" class="form-control" id="fullname"
                                           placeholder="{{__('esas.adSoyad')}}"
                                           value="" required
                                           name="name"/>
                                </div>
                                <div class="form-group">
                                    <label for="address">{{__('esas.unvan')}}*</label>
                                    <input type="text" class="form-control" id="address"
                                           placeholder="{{__('esas.unvan')}}" required
                                           value="" name="unvan"/>
                                </div>
                                <div class="form-group">
                                    <label for="address">{{__('esas.seher')}}*</label>
                                    <input type="text" class="form-control" id="city"
                                           placeholder="{{__('esas.seher')}}" required
                                           value="Bakı" name="city" disabled/>
                                </div>
                                <div class="form-group">
                                    <label for="tel">{{__('esas.telefon')}}*</label>
                                    <input type="tel" class="form-control" id="tel" placeholder="{{__('esas.telefon')}}"
                                           required value=""
                                           name="telefon"/>
                                </div>
                                <div class="form-group">
                                    <label for="e-mail">{{__('esas.email')}}*</label>
                                    <input type="email" class="form-control" id="e-mail"
                                           placeholder="{{__('esas.email')}}" required
                                           value="" name="email"/>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="col-12 col-lg-5">
                        <div class="order-info-wrapper">
                            <div class="cart-info">
                                <h4 style="text-transform:unset">{{__('esas.sifaris')}}</h4>
                                <hr/>
                                <ul class="price-list">
                                    <li class="price-list-item"><span class="name">{{__('esas.cem')}}</span><span
                                            class="price">{{number_format($totalPrice,2)}} Azn</span></li>
                                    <li class="price-list-item"><span class="name">{{__('esas.catdirilma')}}</span><span
                                            class="price">{{number_format($delivery,2)}} Azn</span></li>
                                            <li class="price-list-item"><span class="name">Ümumi</span><span
                                    class="price">{{number_format($delivery+$totalPrice,2)}} Azn</span></li>
                                </ul>
                            </div>
                            <div class="cart-info">
                                <form id="orderTypeForm">
                                    <div class="order-type-item">
                                        <label for="individual">Individual</label>
                                        <input class="form-check-input" type="radio" name="orderType" id="individual" value="0"
                                               checked>
                                    </div>
                                    <div class="order-type-item">
                                        <label for="corporative">Corporative</label>
                                        <input class="form-check-input" type="radio" name="orderType" value="1"
                                               id="corporative">
                                    </div>
                                </form>
                            </div>
                            <div class="mt-3" style="">
                               <p class="text-info" style="font-size:17px"><i class="fa fa-info-circle" aria-hidden="true"></i> Qeyd: Qiymətlərə ƏDV daxildir.</p>
                            </div>
                            <button type="submit" href="#" id="btn-confirm" form="order-form"
                                    class="btn-general orange">{{__('esas.sifarisiTestiqle')}}</button>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endif
@endsection
@section('additionalJs')
<script type="text/javascript">
        $('#btn-confirm').click(function(){
            $('#orderTypeForm :input').not(':submit').clone().hide().appendTo('#order-form');
            return true;
        });
    </script>
@endsection
