@extends('layouts.dizayn')
@section('content')
<!-- Title -->
    <title>Lucky | {{__('esas.kabinetTitlev2')}}</title>
    <section id="profile">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <header class="page-heading">
                        <h1>{{__('esas.kabinetTitlev2')}}</h1>
                        <p><a href="{{route('homepage',['locale'=>Session('lang')])}}">{{__('esas.anasehve')}}</a> /
                            <a>{{__('esas.kabinetTitlev2')}}</a></p>
                    </header>
                </div>
                <div class="col-12">
                    <div class="welcome-user d-flex align-items-center justify-content-start">
                        <i class="fa fa-user" aria-hidden="true"></i>
                        <h2 class="welcome-message">{{__('esas.xosGeldiniz')}}, <span
                                class="user-name">{{ucfirst(\Illuminate\Support\Facades\Auth::user()->name)}}</span>
                        </h2>
                    </div>
                    @if(Session::has('updatedUser'))
                        <div class="alert text-center alert-success">{{__('esas.updatedUser')}}
                        </div>
                    @elseif(Session::has('message'))
                        <div class="alert text-center" style="background-color: #fc8410;color: #fff">
                            {{__('esas.updatedUserWarning')}}
                        </div>
                    @endif
                    <div class="user-info">
                        <form class="profile-form"
                              action="{{route('viewRegisterUpdate',['locale'=>Session('lang'),'id'=>\Illuminate\Support\Facades\Auth::user()->id])}}"
                              method="post">
                            @csrf()
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="user-name">Şirkət adı *</label>
                                        <input type="text" class="form-control" id="compant_name" name="company_name"
                                               placeholder="Şirkət adı *"
                                               @if(\Illuminate\Support\Facades\Auth::user()) value="{{\Illuminate\Support\Facades\Auth::user()->company_name}}" @endif />
                                    </div>
                                    <div class="mb-3">
                                        <label for="user-name">{{__('esas.adSoyad')}}*</label>
                                        <input type="text" class="form-control" id="user-name" name="name"
                                               placeholder="{{__('esas.adSoyad')}}*"
                                               @if(\Illuminate\Support\Facades\Auth::user()) value="{{\Illuminate\Support\Facades\Auth::user()->name}}" @endif />
                                    </div>
                                    <div class="mb-3">
                                        <label for="user-address">{{__('esas.unvan')}}</label>
                                        <input type="text" class="form-control" id="user-address" name="address"
                                               placeholder="{{__('esas.unvan')}}"
                                               @if(\Illuminate\Support\Facades\Auth::user()) value="{{\Illuminate\Support\Facades\Auth::user()->address}}"
                                               @endif required/>
                                    </div>
                                    <div class="mb-3">
                                        <label for="user-tel">{{__('esas.telefon')}}</label>
                                        <input type="tel" class="form-control" id="user-tel" name="tel"
                                               placeholder="{{__('esas.telefon')}}"
                                               @if(\Illuminate\Support\Facades\Auth::user()) value="{{\Illuminate\Support\Facades\Auth::user()->telefon}}"
                                               @endif required/>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="user-email">{{__('esas.epoct')}}*</label>
                                        <input type="email" class="form-control" id="user-email" name="email"
                                               placeholder="{{__('esas.epoct')}}"
                                               @if(\Illuminate\Support\Facades\Auth::user()) value="{{\Illuminate\Support\Facades\Auth::user()->email}}"
                                               @endif required/>
                                    </div>
                                    <div class="mb-3">
                                        <label for="user-pass">{{__('esas.seher')}}</label>
                                        <input type="text" class="form-control" id="user-city" name="city" value="{{\Illuminate\Support\Facades\Auth::user()->city}}"
                                               placeholder="{{__('esas.seher')}}"/>
                                    </div>
                                    <div class="mb-3">
                                        <label for="user-pass">{{__('esas.sifre')}}</label>
                                        <input type="password" class="form-control" id="user-pass" name="password"
                                               placeholder="******"/>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="button-group d-flex align-items-center justify-content-between">
                                        {{--                                        <button class="btn-general delete" name="Delete">{{__('esas.sil')}}</button>--}}
                                        <button class="btn-general green">{{__('esas.yaddaSaxla')}}</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
