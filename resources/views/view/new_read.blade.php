@extends('layouts.dizayn')
@section('content')
<section id="about-pg">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="page-nav center">
                        <a href="@if(Session('lang') == 'az') {{url('/')}} @else {{url(Session('lang').'/')}} @endif">Əsas səhifə</a>
                        <img src="{{asset('sobsan/img/icon/icons-page-nav.svg')}}" alt="">
                        <a href="@if(Session('lang') == 'az') {{url('aksiyalar-ve-xeberler')}} @elseif(Session('lang') == 'en') {{url('en/promotions-and-news')}}@elseif(Session('lang') == 'ru') {{url('ru/akcii-i-novosti')}} @endif">Aksiyalar</a>
                        <img src="{{asset('sobsan/img/icon/icons-page-nav.svg')}}" alt="">
                        <a href="javascript:window.location.href=window.location.href">{{$new->title}}</a>
                    </div>
                </div>
                <div class="col-12">
                    <div class="heading-wrapper center">
                        <h1 class="page-heading">{{$new->title}} </h1>
                    </div>
                </div>
            </div>
            <div class="row about-content">
                <div class="col-12 col-lg-6 col-xl-7">
                    <div class="about-left">
                        {!!$new->description!!}
                    </div>
                </div>
                
                <div class="col-12 col-lg-6 col-xl-5">
                    <div class="about-right">
                        <img src="{{asset('public/actions/'.$new_details->img)}}" alt="{{$new->title}}">
                    </div>
                </div>
            </div>
            
        </div>
    </section>
@endsection
