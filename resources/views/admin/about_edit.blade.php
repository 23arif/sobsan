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
                                    <input type="hidden" name="type" value="about">

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
                                                    <label class="col-sm-2 control-label">Başlıq({{ucfirst($a->lang)}}
                                                        )</label>
                                                    <div class="col-sm-11 col-sm-offset-1">
                                                        <input type="text" name="title[]" class="form-control"
                                                               value="{{$a->title}}">
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label class="col-sm-2 control-label">Mətn({{ucfirst($a->lang)}}
                                                        )</label>
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

                                                <div class="form-group">
                                                    <label class="col-sm-2 control-label">Mətn 2 ({{ucfirst($a->lang)}}
                                                        )</label>
                                                    <div class="col-sm-11 col-sm-offset-1">
                                                        <textarea id="ckeditor{{$k}}2"
                                                                  name="text2[]">{{$a->text2}}</textarea>
                                                        <script>
                                                            CKEDITOR.replace('ckeditor{{$k}}2', {
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
                                        <label class="col-sm-1 control-label">Əsas foto</label>
                                        <div class="col-sm-11">
                                            <img src="{{asset('/public/article/'.$article->img)}}" alt="" width="150" height="100">
                                            <input type="hidden" value="{{$article->img}}" name="main_old">
                                            <input type="file" id="removefile" class="form-control" name="main_img"
                                                   value="">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-1 control-label">Əsas foto 2</label>
                                        <div class="col-sm-11">
                                            <img src="{{asset('/public/article/'.$article->img2)}}" alt="" width="150" height="100">
                                            <input type="hidden" value="{{$article->img2}}" name="main_old2">
                                            <input type="file" id="removefile" class="form-control" name="main_img2"
                                                   value="">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <ul style="margin-left:15px;border:1px solid black;float:left; width:100%;padding:2%;">
                                            @if(count($galleries->where('type','img')) == 0)
                                                No image
                                            @else
                                                @foreach($galleries->where('type','img') as $image)
                                                    <input type="hidden" name="old_img_gallery_id[]"
                                                           value="{{$image->id}}">
                                                    <div
                                                        style="opacity:1;width:33.333%;display: flex;float:left;margin-bottom:15px;"
                                                        class="alert alert-warning alert-dismissible fade show"
                                                        role="alert">
                                                        <input type="hidden" name="img_gallery_id[]"
                                                               value="{{$image->id}}">
                                                        <img width="200" height="150"
                                                             src="{{asset('/public/article').'/'.$image->name}}"
                                                             alt="">
                                                        <button type="button" class="close" data-dismiss="alert"
                                                                aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                @endforeach
                                            @endif
                                        </ul>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-1 control-label">Foto qalereya</label>
                                        <div class="col-sm-11">
                                            <input type="file" id="removefile" class="form-control" name="img_gallery[]"
                                                   value="" multiple>
                                        </div>
                                    </div>
                                    <div class="row" style="display: flex;justify-content: flex-end">
                                        <button onclick="addInput()" type="button"
                                                class="btn btn-primary">
                                            + Video
                                        </button>
                                    </div>
                                    <br>
                                    <div class="form-group">
                                        <label class="col-sm-1 control-label">Video qalereya</label>
                                        <div class="container col-sm-11">
                                            <div class="row col-sm-12" id="videoGallery">
                                                @foreach($galleries->where('type','video') as $video)
                                                    <input type="hidden" name="old_video_gallery[]" value="{{$video->id}}">
                                                    <div class="col-sm-4"
                                                         style="border:1px solid;margin:0 0px 3px 0;display: flex;justify-content: center;align-items: center">
                                                        <div>
                                                            <input type="text" placeholder="Video kodu..."
                                                                   class="form-control" value="{{$video->name}}" name="current[]" required>
                                                            <input type="hidden" name="current_video_gallery[]" value="{{$video->id}}">
                                                            <img
                                                                src="{{asset('/public/ArticleVideoThumbnail/'.$video->video_img)}}"
                                                                width="100" height="100" alt="">
                                                        </div>
                                                        <button class="btn btn-danger" id="remove-btn1" type="button">-
                                                        </button>
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <button type="submit" class="btn btn-success">Edit
                                        </button>
                                    </div>


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
@section('js')
    <script>
        function addInput() {
            $(document).ready(function () {
                var wrapper = $('#videoGallery');
                var fieldHTML = '<div class="col-sm-4" style="height:154px;border:1px solid;margin:0 0px 3px 0;display: flex;justify-content: center;align-items: center"><div><input type="text"  placeholder="Video kodu..." class="form-control" required name="new_video_gallery[]"\n' +
                    '                                                   value=""><input type="file" name="new_video_thumbnail[]" class="form-control"></div><button class="btn btn-danger remove-btn" type="button" style="display: none">-</button></div>';
                var x = 1;
                x++;
                $(wrapper).append(fieldHTML);
                if (x != 1) {
                    $('.remove-btn').css({'display': 'flex'});
                    $(wrapper).on('click', '.remove-btn', function (e) {
                        e.preventDefault();
                        $(this).parent('div').remove();
                        x--;
                    });
                }
            });
        }
        $(document).ready(function () {
            var wrapper1 = $('#videoGallery');
            $(wrapper1).on('click', '#remove-btn1', function (e) {
                e.preventDefault();
                $(this).parent('div').remove();
                x--;
            });
        })
    </script>
@endsection
