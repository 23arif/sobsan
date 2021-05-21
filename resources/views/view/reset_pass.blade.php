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
                
                <form class="register-form" action="{{route('sendMailForgot',['locale'=>Session('lang')])}}" method="post">
                    @csrf()
                    <div class="row">
                        <div class="col-12">
                            <header class="sec-heading">
                                <h4>Şifrə yeniləmə</h4>
                            </header>
                             @if(Session::get('message'))
                            <div class="form-bottom mb-3 d-flex align-items-center alert alert-success">
                                    <i class="fa fa-info-circle" aria-hidden="true"></i>
                                    <p>{{Session::get('message')}}</p>
                                </div>
                            @endif
                            @if(Session::get('noUser'))
                            <div class="alert text-center" style="background-color: #fc8410;color: #fff">
                                    <p class="mb-0">{{Session::get('noUser')}}</p>
                                </div>
                            @endif
                        </div>
                            <div class="col-12">
                                <div class="form-floating mb-3">
                                    <input type="email" class="form-control" id="user-email"
                                           placeholder="name@example.com"
                                           name="email" required/>
                                    <label for="user-email">E-poçt ünvanı *</label>
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
