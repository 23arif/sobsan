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
                                    <input type="hidden" name="type" value="about">

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
                                                <label class="col-sm-1 control-label">Mətn(AZ)</label>
                                                <div class="col-sm-11 col-sm-offset-1">
                                                    <textarea id="ckeditor1" name="text[]"></textarea>
                                                    <script>
                                                        CKEDITOR.replace('ckeditor1', {
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
                                                <label class="col-sm-12 control-label">Mətn (En)</label>
                                                <div class="col-sm-11 col-sm-offset-1">
                                            <textarea id="ckeditor2"
                                                      name="text[]"></textarea>
                                                    <script>
                                                        CKEDITOR.replace('ckeditor2');
                                                    </script>
                                                </div>
                                            </div>
                                            <input type="hidden" value="en" name="lang[]">
                                        </div>
                                        <div class="tab-pane fade" id="pills-contact" role="tabpanel"
                                             aria-labelledby="pills-contact-tab">
                                            <div class="form-group">
                                                <label class="col-sm-12 control-label">Mətn (RU)</label>
                                                <div class="col-sm-11 col-sm-offset-1">
                                            <textarea id="ckeditor3"
                                                      name="text[]"></textarea>
                                                    <script>
                                                        CKEDITOR.replace('ckeditor3');
                                                    </script>
                                                </div>
                                            </div>
                                            <input type="hidden" value="ru" name="lang[]">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="artboardPdf" class="col-sm-1 control-label">Artboard Pdf</label>
                                        <div class="col-sm-11 col-sm-offset-1">
                                            <input class="form-control" id="artboardPdf" type="file" name="img"
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
