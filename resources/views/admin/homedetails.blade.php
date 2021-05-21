@extends('layouts.admin')

@section('content')
    <aside class="content-wrapper sidebarLeft">

        <!-- Page Content -->
        <div class="content container-fluid sidebarRight animated fadeInUp">

            <div class="row">

                <div class="col-sm-12">
                    @if(Session::has('message'))
                        <div class="alert alert-success">{{ Session::get('message') }}</div>
                    @endif
                </div>

                <div class="col-sm-12">

                    <form action="{{route('homeUpdate')}}" method="POST" enctype="multipart/form-data">

                        {!! csrf_field() !!}
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
                                    <label for="address" style="color:grey;">Address (AZ)</label>

                                    <input class="form-control" name="address[]" id="address" type="text" value="{{ $details->where('lang','az')->first()->address }}">
                                </div>

                                <div class="form-group">
                                    <label for="address" style="color:grey;">Video title (AZ)</label>

                                    <input class="form-control" name="video_title[]" id="address" type="text" value="{{ $details->where('lang','az')->first()->video_title }}">
                                </div>

                                <div class="form-group">
                                    <label for="videotext" style="color:grey;">Video text (AZ)</label>
                                    <textarea id="ckeditor2"
                                              name="video_text[]">{{$details->where('lang','az')->first()->video_text}}</textarea>
                                    <script>
                                        CKEDITOR.replace('ckeditor2', {
                                            filebrowserUploadUrl: '/assets/filebrowser/plugin.js'
                                        });
                                    </script>
                                </div>
                                <div class="form-group">
                                    <label for="copyrights" style="color:grey;">Copyrights (AZ)</label>

                                    <input class="form-control" name="copyrights[]" id="copyrights" type="text" value="{{ $details->where('lang','az')->first()->copyrights }}">
                                </div>
                                <div class="form-group">
                                    <label for="footertext" style="color:grey;">Footer Text (AZ)</label>

                                    <input class="form-control" name="footer_text[]" id="footertext" type="text" value="{{ $details->where('lang','az')->first()->footer_text }}">
                                </div>
                                <input type="hidden" value="az" name="lang[]">
                            </div>
                            <div class="tab-pane fade" id="pills-profile" role="tabpanel"
                                 aria-labelledby="pills-profile-tab">
                                <div class="form-group">
                                    <label for="address" style="color:grey;">Address (EN)</label>

                                    <input class="form-control" name="address[]" id="address" type="text" value="{{ $details->where('lang','en')->first()->address }}">
                                </div>

                                <div class="form-group">
                                    <label for="address" style="color:grey;">Video title (EN)</label>

                                    <input class="form-control" name="video_title[]" id="address" type="text" value="{{ $details->where('lang','en')->first()->video_title }}">
                                </div>
                                <div class="form-group">
                                    <label for="videotext" style="color:grey;">Video text (EN)</label>
                                    <textarea id="ckeditor3"
                                              name="video_text[]">{{$details->where('lang','en')->first()->video_text}}</textarea>
                                    <script>
                                        CKEDITOR.replace('ckeditor3', {
                                            filebrowserUploadUrl: '/assets/filebrowser/plugin.js'
                                        });
                                    </script>
                                </div>
                                <div class="form-group">
                                    <label for="copyrights" style="color:grey;">Copyrights (EN)</label>

                                    <input class="form-control" name="copyrights[]" id="copyrights" type="text" value="{{ $details->where('lang','en')->first()->copyrights }}">
                                </div>
                                <div class="form-group">
                                    <label for="footertext" style="color:grey;">Footer Text (EN)</label>

                                    <input class="form-control" name="footer_text[]" id="footertext" type="text" value="{{ $details->where('lang','en')->first()->footer_text }}">
                                </div>
                                <input type="hidden" value="en" name="lang[]">
                            </div>
                            <div class="tab-pane fade" id="pills-contact" role="tabpanel"
                                 aria-labelledby="pills-contact-tab">
                                <div class="form-group">
                                    <label for="address" style="color:grey;">Address (RU)</label>

                                    <input class="form-control" name="address[]" id="address" type="text" value="{{ $details->where('lang','ru')->first()->address }}">
                                </div>
                                <div class="form-group">
                                    <label for="address" style="color:grey;">Video title (RU)</label>

                                    <input class="form-control" name="video_title[]" id="address" type="text" value="{{ $details->where('lang','ru')->first()->video_title }}">
                                </div>
                                <div class="form-group">
                                    <label for="videotext" style="color:grey;">Video text (RU)</label>
                                    <textarea id="ckeditor1"
                                              name="video_text[]">{{$details->where('lang','ru')->first()->video_text}}</textarea>
                                    <script>
                                        CKEDITOR.replace('ckeditor1', {
                                            filebrowserUploadUrl: '/assets/filebrowser/plugin.js'
                                        });
                                    </script>
                                </div>
                                <div class="form-group">
                                    <label for="copyrights" style="color:grey;">Copyrights (RU)</label>

                                    <input class="form-control" name="copyrights[]" id="copyrights" type="text" value="{{ $details->where('lang','ru')->first()->copyrights }}">
                                </div>
                                <div class="form-group">
                                    <label for="footertext" style="color:grey;">Footer Text (RU)</label>

                                    <input class="form-control" name="footer_text[]" id="footertext" type="text" value="{{ $details->where('lang','ru')->first()->footer_text }}">
                                </div>
                                <input type="hidden" value="ru" name="lang[]">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="mainvideo" style="color:grey;">Home əsas video</label>
                            <img src="{{asset('/public/Gallery/'.$details->first()->main_video)}}" alt="" width="150" height="100" style="border: 1px solid;margin-left: 1em">
                            <br>
                            <br>
                            <div class="row">
                                <div class="col-sm-6">
                                    <input class="form-control" name="main_video" id="mainvideo" type="file" value="">
                                </div>
                                <div class="col-sm-6">
                                    <input class="form-control" name="main_video_code" id="mainvideocode" type="text" value="{{ $details->first()->main_video_code }}" placeholder="Video kodu">
                                </div>
                            </div>
                        </div>

                        <div class="row" style="display: flex;justify-content: flex-end;margin:1em 0">
                            <button class="btn btn-success">Dəyiş</button>
                        </div>

                    </form></br>
                </div>

            </div>

        </div>
        <!-- End Page Content -->

    </aside>
@endsection
