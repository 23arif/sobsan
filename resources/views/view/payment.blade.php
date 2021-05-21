@extends('layouts.dizayn')
@section('content')
<section id="about-pg">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="page-nav center">
                        <a href="@if(Session('lang') == 'az') {{url('/')}} @else {{url(Session('lang').'/')}} @endif">Əsas səhifə</a>
                        <img src="{{asset('sobsan/img/icon/icons-page-nav.svg')}}" alt="">
                        <a href="deals.html">{!! $about->getArticles->where('lang',Session('lang'))->first()->title !!}</a>
                    </div>
                </div>
                <div class="col-12">
                    <div class="heading-wrapper center">
                        <h1 class="page-heading">{!! $about->getArticles->where('lang',Session('lang'))->first()->title !!}</h1>
                    </div>
                </div>
            </div>
            <div class="row about-content">
                <div class="col-12 col-lg-6 col-xl-7">
                    <div class="about-left">
                        {!! $about->getArticles->where('lang',Session('lang'))->first()->text !!}
                    </div>
                </div>
                <div class="col-12 col-lg-6 col-xl-5">
                    <div class="about-right">
                        <img src="{{asset('public/article/'.$about->img)}}" alt="{!! $about->getArticles->where('lang',Session('lang'))->first()->title !!}">
                    </div>
                </div>
            </div>
            <div class="row about-content">
                <div class="col-12 col-lg-6 col-xl-7">
                    <div class="about-left">
                        {!! $about->getArticles->where('lang',Session('lang'))->first()->text2 !!}
                    </div>
                </div>
                <div class="col-12 col-lg-6 col-xl-5">
                    <div class="about-right">
                        <img src="{{asset('public/article/'.$about->img2)}}" alt="{!! $about->getArticles->where('lang',Session('lang'))->first()->title !!}">
                    </div>
                </div>
            </div>
            <div class="owl-carousel owl-theme">
                @foreach($videos as $video)
                <div class="video-box">
                    <img src="{{asset('public/ArticleVideoThumbnail/'.$video->video_img)}}" alt="">
                    <div class="overlay">
                        <a data-fancybox="gallery" href="{{$video->name}}">
                            <img src="{{asset('sobsan/img/icon/icons-video-play.svg')}}" alt="">
                        </a>
                    </div>
                </div>
                @endforeach
                
            </div>
        </div>
    </section>
@endsection
