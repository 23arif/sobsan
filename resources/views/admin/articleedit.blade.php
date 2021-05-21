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
                                      action="{!! URL::action('ArticleController@update',$article->id) !!}"
                                      method="POST"
                                      enctype="multipart/form-data">

                                    {!! csrf_field() !!}

                                    <input type="hidden" name="old_img" value="{{$article->img}}">

                                    <div class="form-group">
                                        <label class="col-sm-1 control-label">Article Kateqoriyaları</label>
                                        <div class="col-sm-11 col-sm-offset-1">
                                            <select name="article_category" class="form-control" required="">
                                                @foreach($articleCat as $cat)
                                                    <option @if($cat->id == $article->category_id ) selected @endif value="{{$cat->id}}">
                                                        @foreach($cat->getCat->where('lang',Lang::getLocale()) as $c)
                                                            {{ucfirst($c->name)}}
                                                        @endforeach
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <br>
                                    <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist"
                                        style="margin-bottom: 25px">
                                        @foreach($articleTranslates as $k=>$articleLang)
                                            <li class="nav-item @if ($k== 0) active @endif">
                                                <a class="nav-link active" id="pills-home-tab" data-toggle="pill"
                                                   href="#pills-home{{$k}}" role="tab" aria-controls="pills-home"
                                                   aria-selected="true">{{strtoupper($articleLang->lang)}}</a>
                                            </li>
                                        @endforeach
                                    </ul>
                                    <div class="tab-content" id="pills-tabContent">
                                        @foreach($articleTranslates as $k=>$articleTranslate)
                                            <div class="tab-pane @if($k==0)fade active in @endif" id="pills-home{{$k}}"
                                                 role="tabpanel"
                                                 aria-labelledby="pills-home-tab">
                                                <div class="form-group">
                                                    <label class="col-sm-1 control-label">Başlıq
                                                        ({{strtoupper($articleTranslate->lang)}})</label>
                                                    <div class="col-sm-11">
                                                        <input type="text" name="basliq[]"
                                                               value="{{$articleTranslate->title}}"
                                                               class="form-control">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-sm-1 control-label">Qısa mətn
                                                        ({{strtoupper($articleTranslate->lang)}})</label>
                                                    <div class="col-sm-11 col-sm-offset-1">
                                                    <textarea id="ckeditor{{$k}}"
                                                              name="article_ozu[]">{!! $articleTranslate->short_text !!}</textarea>
                                                        <script>
                                                            CKEDITOR.replace('ckeditor{{$k}}',{
                                                                filebrowserUploadUrl: '/assets/filebrowser/plugin.js'
                                                            });
                                                        </script>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-sm-1 control-label">Mətn
                                                        ({{strtoupper($articleTranslate->lang)}})</label>
                                                    <div class="col-sm-11 col-sm-offset-1">
                                                    <textarea id="ckeditor{{$k}}2"
                                                              name="article_ardi[]">{!! $articleTranslate->text !!}</textarea>
                                                        <script>
                                                            CKEDITOR.replace('ckeditor{{$k}}2',{
                                                                filebrowserUploadUrl: '/assets/filebrowser/plugin.js'
                                                            });
                                                        </script>
                                                    </div>
                                                </div>
                                                <input type="hidden" value="{{$articleTranslate->lang}}" name="lang[]">
                                            </div>
                                        @endforeach
                                    </div>
                                    <div class="col-sm-11 col-sm-offset-1">
                                        <input type="file" id="removefile" name="img" value="">
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
