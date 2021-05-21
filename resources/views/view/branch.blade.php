@extends('layouts.dizayn')
@section('content')
<section id="branch-pg">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="page-nav center">
                        <a href="@if(Session('lang') == 'az') {{url('/')}} @else {{url(Session('lang').'/')}} @endif">Əsas səhifə</a>
                        <img src="{{asset('sobsan/img/icon/icons-page-nav.svg')}}" alt="">
                        <a href="javascript:window.location.href=window.location.href">Xidmət şəbəkəsi</a>
                    </div>
                </div>
                <div class="col-12">
                    <div class="heading-wrapper center">
                        <h1 class="page-heading">Xidmət şəbəkəsi</h1>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="map-wrapper"> 
                        <iframe  src="https://www.google.com/maps/d/u/6/embed?mid=1rV3ZvArd1_TGDkxelN8QaGCv7yPtoRVD" ></iframe>
                     </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <h2 class="section-heading">Ünvanlarımız</h2>
                </div>
                @foreach($branches as $branch)
                <div class="col-12 col-md-6">
                    <div class="branch-box">
                        <div class="box-img">
                            <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 29.879 42.98">
                                <path id="Path_3882" data-name="Path 3882" d="M127.913,20.979a14.957,14.957,0,0,0-14.94,14.94c0,10.354,14.954,28.04,14.954,28.04s14.925-18.2,14.925-28.04A14.957,14.957,0,0,0,127.913,20.979Zm4.508,19.314a6.375,6.375,0,1,1,0-9.015A6.355,6.355,0,0,1,132.42,40.293Z" transform="translate(-112.973 -20.979)" fill="#d8232a" />
                            </svg>
                        </div>
                        
                        <div class="box-text">
                            <a href="{{$branch->map_link}}">
                                <h3>{{$branch->getBranch->where('lang',Session('lang'))->first()->name}}</h3>
                            </a>
                            <p><strong>Ünvan: </strong> {{$branch->getBranch->where('lang',Session('lang'))->first()->address}}</p>
                            <a href="tel:{{$branch->phone_number}}"><strong>Tel: </strong>{{$branch->phone_number}}</a>
                        </div>
                    </div>
                </div>
                
                @endforeach


                
            </div>
        </div>
    </section>
@endsection
