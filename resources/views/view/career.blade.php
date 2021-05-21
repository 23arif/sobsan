
@extends('layouts.dizayn')
@section('content')
<section id="career-pg">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="page-nav center">
                        <a href="@if(Session('lang') == 'az') {{url('/')}} @else {{url(Session('lang').'/')}} @endif">Əsas səhifə</a>
                        <img src="{{asset('sobsan/img/icon/icons-page-nav.svg')}}" alt="">
                        <a href="javascript:window.location.href=window.location.href">Karyera</a>
                    </div>
                </div>
                <div class="col-12">
                    <div class="heading-wrapper center">
                        <h1 class="page-heading">Karyera</h1>
                    </div>
                </div>
            </div>
            <div class="vacancy-nav">
                <nav>
                    <div class="nav nav-tabs" id="nav-tab" role="tablist">
                        <button class="nav-link active" id="nav-vacancy-tab" data-bs-toggle="tab" data-bs-target="#nav-vacancy" type="button" role="tab" aria-controls="nav-vacancy" aria-selected="true">Aktiv vakansiyalar</button>
                        <button class="nav-link" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-profile" type="button" role="tab" aria-controls="nav-profile" aria-selected="false">İşə qəbul üçün müraciət anketi</button>
                    </div>
                </nav>
                <div class="tab-content" id="nav-tabContent">
                    <div class="tab-pane fade show active" id="nav-vacancy" role="tabpanel" aria-labelledby="nav-vacancy-tab">
                        <div class="row">
                            @foreach($careers as $career)
                            <div class="col-sm-12 col-lg-6 col-xl-4">
                                <div class="vacancy-box">
                                    <h2>{{$career->getCareer->where('lang',Session('lang'))->first()->title}}</h2>
                                    {!!$career->getCareer->where('lang',Session('lang'))->first()->short_text!!}
                                    <a href="@if(Session('lang')=='az'){{url('career/'.$career->getCareer->where('lang',Session('lang'))->first()->slug)}} @else {{url(Session('lang').'/career/'.$career->getCareer->where('lang',Session('lang'))->first()->slug)}} @endif" class="btn-general">
                                        <span>Ətraflı</span>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                                            <g fill="none" fill-rule="evenodd" stroke-linecap="round" stroke-linejoin="round">
                                                <g id="arrow-right" stroke="#d8232a" stroke-width="1.3">
                                                    <g>
                                                        <path d="M18.5.497L23.5 5.497 18.5 10.497M23.5 5.497L.5 5.497" transform="translate(0 7)" />
                                                    </g>
                                                </g>
                                            </g>
                                        </svg>
                                    </a>
                                </div>
                            </div>
                            @endforeach
                            
                        </div>
                    </div>
                    <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                        <form action="" id="career-form" class="form-general">
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
                                <div class="col-lg-6">
                                    <div class="file-input">
                                        <input type="file" class="form-control" id="user-file" placeholder="CV daxil edin" />
                                        <label for="user-file"> CV *<img src="img/icon/paperclip.svg" alt=""></label>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-floating">
                                        <select class="form-select" id="floatingSelect" aria-label="Floating label select" required>
                                            <option disabled selected></option>
                                            <option value="1">Vəzifə 1</option>
                                            <option value="2">Vəzifə 2</option>
                                            <option value="3">Vəzifə 3</option>
                                        </select>
                                        <label for="floatingSelect">Müraciət etmək istədiyiniz vəzifə *</label>
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
            </div>
        </div>
    </section>
@endsection
