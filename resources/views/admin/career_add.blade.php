@extends('layouts.admin')
@section('content')


    <aside class="content-wrapper collapse sidebarLeft">

        <!-- Page Content -->
        <div class="content container-fluid sidebarRight animated fadeInUp mail compose-wrapper">

            @foreach($errors->all() as $error)

                {!! $error !!}}

            @endforeach
            <div class="error">
                <span></span>
            </div>
            <div class="panel panel-white">
                <div class="panel-body">
                    <div class="row">
                    </div>
                    <div class="row">
                        <div class="col-sm-9 col-md-10">
                            <div class="compose-container">
                                <form class="form-horizontal" role="form" id="banner"
                                      action="{{url('career_store')}}" method="POST"
                                      enctype="multipart/form-data">
                                    {!! csrf_field() !!}

                                    
                                    
                                        
                                            <div class="form-group">
                                                <label class="col-sm-1 control-label">Baş.tarix</label>
                                                <div class="col-sm-11">
                                                    <input type="date" name="start_date" value="{!! old('basliq') !!}"
                                                           class="form-control" required>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="col-sm-1 control-label">Bit.tarix</label>
                                                <div class="col-sm-11">
                                                    <input type="date" name="end_date" value="{!! old('basliq') !!}"
                                                           class="form-control" required>
                                                </div>
                                            </div>

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
                                                <label class="col-sm-1 control-label">Başlıq(Az)</label>
                                                <div class="col-sm-11">
                                                    <input type="text" name="title[]" value="{!! old('basliq') !!}"
                                                           class="form-control" required>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-sm-1 control-label">Qısa Mətn(Az)</label>
                                                <div class="col-sm-11">
                                                    <textarea id="ckeditor10"
                                                      name="short_text[]">{!! old('text') !!}</textarea>
                                                    <script>
                                                        CKEDITOR.replace('ckeditor10', {
                                                            filebrowserUploadUrl: '/assets/filebrowser/plugin.js'
                                                        });
                                                    </script>
                                                </div>
                                                
                                            </div>
                                            <div class="form-group">
                                                <label class="col-sm-1 control-label">Mətn(Az)</label>
                                                <div class="col-sm-11">
                                                    <textarea id="ckeditor"
                                                      name="text[]">{!! old('text') !!}</textarea>
                                                    <script>
                                                        CKEDITOR.replace('ckeditor', {
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
                                                <label class="col-sm-1 control-label">Başlıq(En)</label>
                                                <div class="col-sm-11">
                                                    <input type="text" name="title[]" value="{!! old('basliq') !!}"
                                                           class="form-control" required>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-sm-1 control-label">Qısa Mətn(En)</label>
                                                <div class="col-sm-11">
                                                    <textarea id="ckeditor11"
                                                      name="short_text[]">{!! old('text') !!}</textarea>
                                                    <script>
                                                        CKEDITOR.replace('ckeditor11', {
                                                            filebrowserUploadUrl: '/assets/filebrowser/plugin.js'
                                                        });
                                                    </script>
                                                </div>
                                                
                                            </div>
                                            <div class="form-group">
                                                <label class="col-sm-1 control-label">Mətn(En)</label>
                                                <div class="col-sm-11">
                                                    <textarea id="ckeditor1"
                                                      name="text[]">{!! old('text') !!}</textarea>
                                                    <script>
                                                        CKEDITOR.replace('ckeditor1', {
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
                                                <label class="col-sm-1 control-label">Başlıq(Ru)</label>
                                                <div class="col-sm-11">
                                                    <input type="text" name="title[]" value="{!! old('basliq') !!}"
                                                           class="form-control" required>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-sm-1 control-label">Qısa Mətn(Ru)</label>
                                                <div class="col-sm-11">
                                                    <textarea id="ckeditor12"
                                                      name="short_text[]">{!! old('text') !!}</textarea>
                                                    <script>
                                                        CKEDITOR.replace('ckeditor12', {
                                                            filebrowserUploadUrl: '/assets/filebrowser/plugin.js'
                                                        });
                                                    </script>
                                                </div>
                                                
                                            </div>
                                            <div class="form-group">
                                                <label class="col-sm-1 control-label">Mətn(Ru)</label>
                                                <div class="col-sm-11">
                                                    <textarea id="ckeditor2"
                                                      name="text[]">{!! old('text') !!}</textarea>
                                                    <script>
                                                        CKEDITOR.replace('ckeditor2', {
                                                            filebrowserUploadUrl: '/assets/filebrowser/plugin.js'
                                                        });
                                                    </script>
                                                </div>
                                                
                                            </div>
                                            <input type="hidden" value="ru" name="lang[]">
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
