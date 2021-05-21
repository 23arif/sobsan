@extends('layouts.registerlayout')
@section('content')
<!-- Title -->
    <title>Lucky | {{__('esas.qeydiyyat')}}</title>
    <section id="register" class="signup">
        <div class="row">
            <div class="col-12 col-lg-3 register-left xs-lg-hidden">
                <img src="{{asset('/lucky/images/logo/logo-header.svg')}}" alt=lucky"" />
                <a class="btn btn-general" href="{{route('viewLogin',['locale'=>Session('lang')])}}" title="signin">{{__('esas.daxilOl')}}</a>
            </div>

            <div class="col-12 col-lg-9 register-right">
                <form class="register-form" action="{{route('viewRegisterStore',['locale'=>Session('lang')])}}" method="post">
                    @csrf()
                    <div class="row">
                        <div class="col-12">
                            <header class="sec-heading">
                                <h1>{{__('esas.qeydiyyat')}}</h1>
                            </header>
                        </div>
                        @if(Session::has('message'))
                            <div class="col-12">
                                <div class="alert text-center" style="background-color: #fc8410;color: #fff">{{ Session::get('message') }}</div>
                            </div>
                        @endif
                        <div class="col-12 col-md-6">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="company-name" placeholder="Şirkət adı *" name="companyName"  required/>
                                <label for="company-name">Şirkət adı *</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="user-address" placeholder="{{__('esas.unvan')}} *" name="address" required/>
                                <label for="user-address">{{__('esas.unvan')}}*</label>
                            </div>
                             <div class="form-floating mb-3">
                                <input type="password" class="form-control" id="user-pass" placeholder="{{__('esas.sifre')}}" name="password" required />
                                <label for="user-pass">{{__('esas.sifre')}} *</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="password" class="form-control" id="user-pass-val" placeholder="{{__('esas.sifreTestiq')}}" name="repeatPass" required />
                                <label for="user-pass-val">{{__('esas.sifreTestiq')}}</label>
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="user-name" placeholder="Əlaqəli şəxs *" name="nameSurname"  required/>
                                <label for="user-name">Əlaqəli şəxs *</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="email" class="form-control" id="user-email" placeholder="name@example.com" name="email" required />
                                <label for="user-email">{{__('esas.epoct')}} *</label>
                            </div>
                           <div class="form-floating mb-3">
                                <input type="tel" class="form-control" id="user-tel" placeholder="{{__('esas.telefon')}}" name="tel" required />
                                <label for="user-tel">{{__('esas.telefon')}}*</label>
                            </div>
                            
                        </div>
                        <div class="col-12 d-flex justify-content-center">
                            <button type="submit" class="btn btn-general orange">{{__('esas.qeydiyyat')}}</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection
