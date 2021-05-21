
@extends('layouts.dizayn')
@section('content')
<section id="career-pg">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="page-nav center">
                        <a href="@if(Session('lang') == 'az') {{url('/')}} @else {{url(Session('lang').'/')}} @endif">Əsas səhifə</a>
                        <img src="{{asset('sobsan/img/icon/icons-page-nav.svg')}}" alt="">
                        <a href="@if(Session('lang') == 'az') {{url('career')}} @else {{url(Session('lang').'/career')}} @endif">Karyera</a>
                        <img src="{{asset('sobsan/img/icon/icons-page-nav.svg')}}" alt="">
                        <a href="career-inner.html">{{$career->title}}</a>
                    </div>
                </div>
                <div class="col-12">
                    <div class="heading-wrapper center">
                        <h1 class="page-heading">{{$career->title}}</h1>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="vacancy-date">
                        <p>Başlama tarixi: <span>{{date('d.m.Y',strtotime($career_details->start_date))}}</span></p>
                        <p>Son müraciət tarixi: <span>{{date('d.m.Y',strtotime($career_details->end_date))}}</span></p>
                    </div>
                    <div class="col-12">
                        <div class="vacancy-info">
                            {!! $career->text !!}
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <h2 class="section-heading">Vakansiya üzrə müraciət anketi</h2>
                    </div>
                    <form action="" id="vacancy-form" class="form-general m-0">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-floating">
                                    <input type="text" class="form-control" id="user-name" placeholder="Ad *" required />
                                    <label for="user-name">Ad *</label>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-floating">
                                    <input type="text" class="form-control" id="user-surname" placeholder="Soyad" required />
                                    <label for="user-surname">Soyad *</label>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-floating">
                                    <input type="email" class="form-control" id="user-email" placeholder="name@example.com" required />
                                    <label for="user-email">E-poçt ünvanı *</label>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-floating">
                                    <input type="text" class="form-control" id="user-tel" placeholder="Telefon" />
                                    <label for="user-tel">Telefon</label>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="file-input">
                                    <input type="file" class="form-control" id="user-file" placeholder="CV daxil edin" />
                                    <label for="user-file"> CV *<img src="img/icon/paperclip.svg" alt=""></label>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-floating">
                                    <textarea class="form-control" placeholder="Mesajınız" id="user-message"></textarea>
                                    <label for="user-message">Əlavə qeydləriniz</label>
                                </div>
                            </div>
                        </div>
                        <div class="form-bottom">
                            <div class="form-check">
                                <p><strong>Qeyd: </strong>* işarəsi ilə qeyd olunmuş xanaları doldurmaq mütləqdir</p>
                            </div>
                        </div>
                        <button type="submit" class="btn-general primary">Göndər</button>
                    </form>
                </div>
            </div>
    </section>
@endsection
