@extends('layouts.admin')
@section('content')


    <aside class="content-wrapper collapse sidebarLeft">

        <!-- Page Content -->
        <div class="content container-fluid sidebarRight animated fadeInUp mail compose-wrapper">

            @foreach($errors->all() as $error)

                {!! $error !!}}

            @endforeach

            <div class="panel panel-white">
                <div class="panel-body">

                    <div class="row">


                    </div>

                    <div class="row">

                        <div class="col-sm-9 col-md-10">

                            <div class="compose-container">

                                <form class="form-horizontal" role="form"
                                      action="{!! URL::action('ActionsController@update',$action->id) !!}"
                                      method="POST"
                                      enctype="multipart/form-data">

                                    {!! csrf_field() !!}

                                    <input type="hidden" name="old_img" value="{{$action->img}}">

                                    <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist"
                                        style="margin-bottom: 25px">
                                        @foreach($action->getActions as $k=>$actionLang)
                                            <li class="nav-item @if ($k== 0) active @endif">
                                                <a class="nav-link active" id="pills-home-tab" data-toggle="pill"
                                                   href="#pills-home{{$k}}" role="tab" aria-controls="pills-home"
                                                   aria-selected="true">{{strtoupper($actionLang->lang)}}</a>
                                            </li>
                                        @endforeach
                                    </ul>
                                    <div class="tab-content" id="pills-tabContent">
                                        @foreach($action->getActions as $k=>$actionTranslate)
                                            <div class="tab-pane @if($k==0)fade active in @endif" id="pills-home{{$k}}"
                                                 role="tabpanel"
                                                 aria-labelledby="pills-home-tab">
                                                <div class="form-group">
                                                    <label class="col-sm-1 control-label">Başlıq
                                                        ({{strtoupper($actionTranslate->lang)}})</label>
                                                    <div class="col-sm-11">
                                                        <input type="text" name="basliq[]"
                                                               value="{{$actionTranslate->title}}"
                                                               class="form-control">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-sm-1 control-label">Mətn
                                                        ({{strtoupper($actionTranslate->lang)}})</label>
                                                    <div class="col-sm-11 col-sm-offset-1">
                                                    <textarea id="ckeditor{{$k}}2"
                                                              name="article_ardi[]">{!! $actionTranslate->description !!}</textarea>
                                                        <script>
                                                            CKEDITOR.replace('ckeditor{{$k}}2',{
                                                                filebrowserUploadUrl: '/assets/filebrowser/plugin.js'
                                                            });
                                                        </script>
                                                    </div>
                                                </div>
                                                <input type="hidden" value="{{$actionTranslate->lang}}" name="lang[]">
                                            </div>
                                        @endforeach
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-1 control-label">Image</label>
                                        <div class="col-sm-11">
                                            <img src="{{asset('/public/actions/'.$action->img)}}" alt="" width="150" height="100"><br><br>
                                            <input type="file" id="removefile" name="img" value="" class="form-control">
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
