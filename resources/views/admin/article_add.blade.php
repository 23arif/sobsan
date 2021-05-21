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
                                      action="{!! URL::action('ArticleController@store') !!}" method="POST"
                                      enctype="multipart/form-data">
                                    {!! csrf_field() !!}

                                    <div class="form-group">
                                        <label class="col-sm-1 control-label">Article Category</label>
                                        <div class="col-sm-11 col-sm-offset-1">
                                            <select class="form-control" id="exampleFormControlSelect1" name="article_category">
                                                @foreach($esas as $s)
                                                    <option value="{{$s->id}}">{{ucfirst($s->getCat[0]->name)}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <br>
                                    <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist"
                                        style="margin-bottom: 25px">
                                        <li class="nav-item active">
                                            <a class="nav-link active" id="pills-home-tab" data-toggle="pill"
                                               href="#pills-home" role="tab" aria-controls="pills-home"
                                               aria-selected="true">Az</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" id="pills-profile-tab" data-toggle="pill"
                                               href="#pills-profile" role="tab" aria-controls="pills-profile"
                                               aria-selected="false">En</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" id="pills-contact-tab" data-toggle="pill"
                                               href="#pills-contact" role="tab" aria-controls="pills-contact"
                                               aria-selected="false">Ru</a>
                                        </li>
                                    </ul>
                                    <div class="tab-content" id="pills-tabContent">
                                        <div class="tab-pane fade active in" id="pills-home" role="tabpanel"
                                             aria-labelledby="pills-home-tab">
                                            <div class="form-group">
                                                <label class="col-sm-1 control-label">Başlıq (Az)</label>
                                                <div class="col-sm-11">
                                                    <input type="text" name="basliq[]" value="{!! old('basliq') !!}"
                                                           class="form-control">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-sm-1 control-label">Qısa mətn (Az)</label>
                                                <div class="col-sm-11 col-sm-offset-1">
                                            <textarea id="ckeditor1"
                                                      name="xeber_ozu[]">{!! old('xeber_ozu') !!}</textarea>
                                                    <script>
                                                        CKEDITOR.replace('ckeditor1',{
                                                            filebrowserUploadUrl: '/assets/filebrowser/plugin.js'
                                                        });
                                                    </script>
                                                </div>

                                            </div>
                                            <div class="form-group">
                                                <label class="col-sm-1 control-label">Mətn (Az)</label>
                                                <div class="col-sm-11 col-sm-offset-1">
                                            <textarea id="ckeditor2"
                                                      name="xeber_ardi[]">{!! old('xeber_ardi') !!}</textarea>
                                                    <script>
                                                        CKEDITOR.replace('ckeditor2',{
                                                            filebrowserUploadUrl: '/assets/filebrowser/plugin.js'
                                                        });
                                                    </script>
                                                </div>
                                            </div>
                                            <input type="hidden" value="az" name="lang[]">
                                        </div>
                                        <div class="tab-pane fade" id="pills-profile" role="tabpanel"
                                             aria-labelledby="pills-profile-tab">
                                            <div class="form-group">
                                                <label class="col-sm-1 control-label">Başlıq (En)</label>
                                                <div class="col-sm-11">
                                                    <input type="text" name="basliq[]" value="{!! old('basliq') !!}"
                                                           class="form-control">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-sm-1 control-label">Qısa mətn (En)</label>
                                                <div class="col-sm-11 col-sm-offset-1">
                                            <textarea id="ckeditor3"
                                                      name="xeber_ozu[]">{!! old('xeber_ozu') !!}</textarea>
                                                    <script>
                                                        CKEDITOR.replace('ckeditor3',{
                                                            filebrowserUploadUrl: '/assets/filebrowser/plugin.js'
                                                        });
                                                    </script>
                                                </div>

                                            </div>
                                            <div class="form-group">
                                                <label class="col-sm-1 control-label">Mətn (En)</label>
                                                <div class="col-sm-11 col-sm-offset-1">
                                            <textarea id="ckeditor4"
                                                      name="xeber_ardi[]">{!! old('xeber_ardi') !!}</textarea>
                                                    <script>
                                                        CKEDITOR.replace('ckeditor4',{
                                                            filebrowserUploadUrl: '/assets/filebrowser/plugin.js'
                                                        });
                                                    </script>
                                                </div>
                                            </div>
                                            <input type="hidden" value="en" name="lang[]">
                                        </div>
                                        <div class="tab-pane fade" id="pills-contact" role="tabpanel"
                                             aria-labelledby="pills-contact-tab">
                                            <div class="form-group">
                                                <label class="col-sm-1 control-label">Başlıq (RU)</label>
                                                <div class="col-sm-11">
                                                    <input type="text" name="basliq[]" value="{!! old('basliq') !!}"
                                                           class="form-control">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-sm-1 control-label">Qısa mətn (RU)</label>
                                                <div class="col-sm-11 col-sm-offset-1">
                                            <textarea id="ckeditor5"
                                                      name="xeber_ozu[]">{!! old('xeber_ozu') !!}</textarea>
                                                    <script>
                                                        CKEDITOR.replace('ckeditor5',{
                                                            filebrowserUploadUrl: '/assets/filebrowser/plugin.js'
                                                        });
                                                    </script>
                                                </div>

                                            </div>
                                            <div class="form-group">
                                                <label class="col-sm-1 control-label">Mətn (RU)</label>
                                                <div class="col-sm-11 col-sm-offset-1">
                                            <textarea id="ckeditor6"
                                                      name="xeber_ardi[]">{!! old('xeber_ardi') !!}</textarea>
                                                    <script>
                                                        CKEDITOR.replace('ckeditor6',{
                                                            filebrowserUploadUrl: '/assets/filebrowser/plugin.js'
                                                        });
                                                    </script>
                                                </div>
                                            </div>
                                            <input type="hidden" value="ru" name="lang[]">
                                        </div>
                                    </div>

                                    <div class="col-sm-11 col-sm-offset-1">
                                        <input type="file" id="removefile" name="img" value="">
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


        </div>
        <!-- End Page Content -->

    </aside>



@endsection
