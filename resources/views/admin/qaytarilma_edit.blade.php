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
                                      action="{{asset('article_update/'.$article->id)}}" method="POST"
                                      enctype="multipart/form-data">

                                    {!! csrf_field() !!}
                                    <input type="hidden" name="old_img" value="{{$article->img}}">

                                    <input type="hidden" name="type" value="zemanet">

                                    <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist"
                                        style="margin-bottom: 25px">
                                        @foreach($article->getArticles as $k =>$lang)
                                            <li class="nav-item @if ($k== 0) active @endif">
                                                <a class="nav-link active" id="pills-home-tab" data-toggle="pill"
                                                   href="#pills-home{{$k}}" role="tab" aria-controls="pills-home"
                                                   aria-selected="true">{{ucfirst($lang->lang)}}</a>
                                            </li>
                                        @endforeach
                                    </ul>
                                    <div class="tab-content" id="pills-tabContent">
                                        @foreach($article->getArticles as $k =>$a)
                                            <div class="tab-pane @if($k==0)fade active in @endif" id="pills-home{{$k}}"
                                                 role="tabpanel"
                                                 aria-labelledby="pills-home-tab">
                                                <div class="form-group">
                                                    <label class="col-sm-2 control-label">Mətn({{ucfirst($a->lang)}})</label>
                                                    <div class="col-sm-11 col-sm-offset-1">
                                                        <input type="text" name="title[]" class="form-control" value="{{$a->title}}">
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label class="col-sm-2 control-label">Mətn({{ucfirst($a->lang)}})</label>
                                                    <div class="col-sm-11 col-sm-offset-1">
                                                        <textarea id="ckeditor{{$k}}"
                                                                  name="text[]">{{$a->text}}</textarea>
                                                        <script>
                                                            CKEDITOR.replace('ckeditor{{$k}}', {
                                                                filebrowserUploadUrl: '/assets/filebrowser/plugin.js'
                                                            });
                                                        </script>
                                                    </div>
                                                </div>
                                                <input type="hidden" value="{{$a->lang}}" name="lang[]">
                                            </div>
                                        @endforeach
                                    </div>
                                    <div class="form-group">
                                        @if(!empty($article->where('type','qaytarilma')->first()->img))
                                            <img src="{{asset('/public/article/'.$article->where('type','qaytarilma')->first()->img)}}" width="200" height="150">
                                        @endif
                                        <label for="img" class="col-sm-1 control-label">Image</label>
                                        <div class="col-sm-11 col-sm-offset-1">
                                            <input class="form-control" id="img" type="file" name="img"
                                                   value="">
                                        </div>
                                    </div>

                                    <button style="margin-right:15px;margin-top:10px;float:right"
                                            class="btn btn-success">Add
                                    </button>

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
