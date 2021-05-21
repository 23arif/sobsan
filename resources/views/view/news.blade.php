@extends('layouts.dizayn')
@section('content')
<section id="deals-pg">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="page-nav center">
                        <a href="@if(Session('lang') == 'az') {{url('/')}} @else {{url(Session('lang').'/')}} @endif">Əsas səhifə</a>
                        <img src="{{asset('sobsan/img/icon/icons-page-nav.svg')}}" alt="">
                        <a href="deals.html">Aksiyalar</a>
                    </div>
                </div>
                <div class="col-12">
                    <div class="heading-wrapper center">
                        <h1 class="page-heading">Aksiyalar</h1>
                    </div>
                </div>
            </div>
            <div class="row">
                @foreach($news as $new)
                <div class="col-12 col-md-6 col-xl-4">
                    <div class="deal-box">
                        <a href="{{url($lang[Session('lang')].'/'.$new->getActions->where('lang',Session('lang'))->first()->slug)}}" class="box-img">
                            <img src="{{asset('public/actions/'.$new->img)}}" alt="{{$new->getActions->where('lang',Session('lang'))->first()->title}}">
                        </a>
                        <div class="box-text">
                            <a href="{{url($lang[Session('lang')].'/'.$new->getActions->where('lang',Session('lang'))->first()->slug)}}">
                                <h3 class="deal-name">{{$new->getActions->where('lang',Session('lang'))->first()->title}}</h3>
                            </a>
                            {!! substr($new->getActions->where('lang',Session('lang'))->first()->description,0,150) !!}
                        </div>
                    </div>
                </div>
                @endforeach
                
            </div>
        </div>
    </section>
@endsection
