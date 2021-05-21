@extends('layouts.registerlayout')
@section('content')
    <section id="register" class="reset-pass">
        <div class="row">
            <div class="col-12 col-lg-3 register-left xs-lg-hidden">
                <img src="{{asset('/lucky/images/logo/logo-header.svg')}}" alt=lucky""/>
                <a href="{{route('viewLogin',['locale'=>Session('lang')])}}" class="btn btn-general" title="Go back">Geri
                    dön</a>
            </div>
            <div class="col-12 col-lg-9 register-right">
                <form class="register-form" method="post">
                    @csrf()
                    <div class="row">
                        <div class="col-12">
                            <header class="sec-heading">
                                <h1>Şifrə yeniləmə</h1>
                            </header>
                            @if(Session::has('message'))
                                    <div class="alert text-center" style="background-color: #fc8410;color: #fff">{{ Session::get('message') }}</div>
                                @endif
                        </div>
                            <div class="col-12">
                                <div class="form-floating mb-3">
                                    <input type="password" class="form-control" id="user-pass" placeholder="Password"
                                           name="password" required/>
                                    <label for="user-pass">Şifrə *</label>
                                </div>
                                <div class="form-floating mb-3">
                                    <input type="password" class="form-control" id="user-pass-val"
                                           placeholder="Password"
                                           name="repeatpassword" required/>
                                    <label for="user-pass-val">Şifrəni təsdiqlə *</label>
                                </div>
                            </div>
                            <div class="col-12 d-flex justify-content-center">
                                <button type="submit" class="btn btn-general orange">Göndər</button>
                            </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection
