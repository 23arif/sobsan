@extends('layouts.registerlayout')
@section('content')
<!-- Title -->
    <title>Lucky | {{__('esas.daxilOl')}}</title>
        <section id="register" class="signin">
            <div class="row">
                <div class="col-12 col-lg-3 register-left xs-lg-hidden">
                    <img src="{{asset('/lucky/images/logo/logo-header.svg')}}" alt=lucky"" />
                    <a class="btn btn-general" href="{{route('viewRegister',['locale'=>Session('lang')])}}" title="signin">{{__('esas.qeydiyyat')}}</a>
                </div>
                <div class="col-12 col-lg-9 register-right">
                    <form class="register-form" method="POST" action="{{route('customerLogin',['locale'=>Session('lang')])}}">
                        @csrf()
                        <div class="row">
                            <div class="col-12">
                                <header class="sec-heading">
                                    <h1>{{__('esas.daxilOl')}}</h1>
                                </header>
                                @if(Session::has('message'))
                                    <div class="alert alert-warning text-center">{{ Session::get('message') }}</div>
                                @endif
                            </div>
                            <div class="col-12">
                                <div class="form-floating mb-3">
                                    <input type="email" class="form-control @error('email') is-invalid @enderror" id="user-email" placeholder="name@example.com" name="email" required autocomplete="email" autofocus/>
                                    <label for="user-email">E-poçt ünvanı *</label>
                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-floating mb-3">
                                    <input type="password" class="form-control @error('password') is-invalid @enderror" id="user-pass" placeholder="Password" required  autocomplete="current-password" name="password"/>
                                    <label for="user-pass">Şifrə *</label>

                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-bottom mb-3 d-flex align-items-center justify-content-between">
                                    <div class="form-check d-flex align-items-center justify-content-center">
                                        <input type="checkbox" class="form-check-input" id="remember" />
                                        <label class="form-check-label" for="remember">Məni xatırla</label>
                                    </div>
                                    <div class="forgot-pass">
                                        <a href="{{route(__('esas.sifremiUnutdum'),['locale'=>Session('lang')])}}" title="Forgot password">Şifrəmi unutdum</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 d-flex justify-content-center">
                                <button type="submit" class="btn btn-general orange">{{__('esas.daxilOl')}}</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </section>
@endsection
