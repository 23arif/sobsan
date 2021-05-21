@extends('layouts.dizayn')
@section('content')
<section id="contact-pg">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="page-nav center">
                        <a href="@if(Session('lang') == 'az') {{url('/')}} @else {{url(Session('lang').'/')}} @endif">Əsas səhifə</a>
                        <img src="{{asset('sobsan/img/icon/icons-page-nav.svg')}}" alt="">
                        <a href="javascript:window.location.href=window.location.href">Əlaqə</a>
                    </div>
                </div>
                <div class="col-12">
                    <div class="heading-wrapper center">
                        <h1 class="page-heading">Əlaqə</h1>
                    </div>
                </div>
            </div>
            <div class="contact-main">
                <div class="row">
                    <div class="col-12 col-lg-6">
                        <div class="contact-right">
                            <h2>Lorem Ipsum</h2>
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptas voluptates repudiandae consequuntur eius. </p>
                            <form action="" id="contact-form" class="form-general">
                                <div class="form-floating">
                                    <input type="text" class="form-control" id="user-name" placeholder="Ad, soyad" required />
                                    <label for="user-name">Ad, soyad *</label>
                                </div>
                                <div class="form-floating">
                                    <input type="email" class="form-control" id="user-heading" placeholder="E-poçt *" required />
                                    <label for="user-heading">E-poçt *</label>
                                </div>
                                <div class="form-floating">
                                    <textarea class="form-control" placeholder="Mesajınız" id="user-message"></textarea>
                                    <label for="user-message">Mesajınız *</label>
                                </div>
                                <button type="submit" class="btn-general primary">Göndər</button>
                            </form>
                        </div>
                    </div>
                    <div class="col-12 col-lg-6 d-flex align-items-center justify-content-center">
                        <div class="contact-left">
                            <div class="contact-box">
                                <img src="{{asset('sobsan/img/icon/contact-tel.svg')}}" alt="">
                                <a href="tel:{{$settings->nomre}}">{{$settings->nomre}}</a>
                            </div>
                            <div class="contact-box">
                                <img src="{{asset('sobsan/img/icon/contact-email.svg')}}" alt="">
                                <a href="mailto:{{$settings->email}}">{{$settings->email}}</a>
                            </div>
                            <div class="contact-box">
                                <img src="{{asset('sobsan/img/icon/contact-location.svg')}}" alt="">
                                <a href="http://maps.google.com/{{$settings->adress}}">{{$home->address}}</a>
                            </div>
                            <div class="social-box">
                                <ul class="menu-social">
                                    <li><a target="_blank" class="block-link" href="{{$settings->facebook}}"><img src="{{asset('sobsan/img/icon/social-facebook.svg')}}" alt="facebook"></a></li>
                                    <li><a target="_blank" class="block-link" href="{{$settings->instagram}}"><img src="{{asset('sobsan/img/icon/social-instagram.svg')}}" alt="instagram"></a></li>
                                    <li><a target="_blank" class="block-link" href="{{$settings->youtube}}"><img src="{{asset('sobsan/img/icon/social-youtube.svg')}}" alt="youtube"></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
