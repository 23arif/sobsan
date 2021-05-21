@extends('layouts.admin') @section('content')

    <aside class="content-wrapper collapse sidebarLeft">

        <!-- Page Content -->
        <div class="content container-fluid sidebarRight animated fadeInUp mail compose-wrapper">

            @foreach($errors->all() as $error) {!! $error !!}} @endforeach

            <div class="panel panel-white">
                <div class="panel-body">

                    <div class="row">

                    </div>

                    <div class="row">

                        <div class="col-sm-9 col-md-10">

                            <div class="compose-container">

                                <form class="form-horizontal" role="form"
                                      action="{!! URL::action('SliderController@update',$slider->id) !!}" method="POST"
                                      enctype="multipart/form-data">

                                    {!! csrf_field() !!}

                                    <input type="hidden" name="old_img" value="{{$slider->img}}">

                                    <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist"
                                        style="margin-bottom: 25px">
                                        @foreach($slider->getSlider as $k=>$sliderLang)
                                            <li class="nav-item @if ($k== 0) active @endif">
                                                <a class="nav-link active" id="pills-home-tab" data-toggle="pill"
                                                   href="#pills-home{{$k}}" role="tab" aria-controls="pills-home"
                                                   aria-selected="true">{{strtoupper($sliderLang->lang)}}</a>
                                            </li>
                                        @endforeach
                                    </ul>

                                    <div class="tab-content" id="pills-tabContent">
                                        @foreach($slider->getSlider as $k=>$sliderTranslate)
                                            <div class="tab-pane @if($k==0)fade active in @endif" id="pills-home{{$k}}"
                                                 role="tabpanel"
                                                 aria-labelledby="pills-home-tab">
                                                <div class="form-group">
                                                    <label class="col-sm-1 control-label">Başlıq
                                                        ({{strtoupper($sliderTranslate->lang)}})</label>
                                                    <div class="col-sm-11">
                                                        <input type="text" name="basliq[]"
                                                               value="{{$sliderTranslate->title}}"
                                                               class="form-control">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-sm-1 control-label">Mətn
                                                        ({{strtoupper($sliderTranslate->lang)}})</label>
                                                    <div class="col-sm-11 col-sm-offset-1">
                                                    <textarea id="ckeditor{{$k}}2"
                                                              name="article_ardi[]">{!! $sliderTranslate->text !!}</textarea>
                                                        <script>
                                                            CKEDITOR.replace('ckeditor{{$k}}2',{
                                                                filebrowserUploadUrl: '/assets/filebrowser/plugin.js'
                                                            });
                                                        </script>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                        <label class="col-sm-1 control-label">Slider link</label>
                                        <div class="col-sm-11">
                                            <input type="text" name="link[]" value="{{$sliderTranslate->link}}"
                                                   class="form-control">
                                        </div>
                                    </div>
                                                <div class="form-group">
                                                    <label class="col-sm-1 control-label">Button adı
                                                        ({{strtoupper($sliderTranslate->lang)}})</label>
                                                    <div class="col-sm-11">
                                                        <input type="text" name="button[]"
                                                               value="{{$sliderTranslate->button}}"
                                                               class="form-control">
                                                    </div>
                                                </div>
                                                <input type="hidden" value="{{$sliderTranslate->lang}}" name="lang[]">
                                            </div>
                                        @endforeach
                                    </div>

                                    

                                    <div class="form-group">
                                        <label class="col-sm-1 control-label">Slider foto</label>
                                        <div class="col-sm-11">
                                            <img src="{{asset('/public/slider/'.$slider->img)}}" alt="" width="150" height="100"><br><br>
                                            <input type="file" name="img" value=""
                                                   class="form-control">
                                        </div>
                                    </div>

                                    <button style="float:right;margin-top:20px" class="btn btn-success">Edit</button>
                                </form>

                            </div>

                        </div>
                    </div>

                </div>
            </div>

        </div>
        <!-- End Page Content -->

    </aside>

@endsection
