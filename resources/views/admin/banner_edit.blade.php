@extends('layouts.admin') @section('content')

<aside class="content-wrapper collapse sidebarLeft">
    <!-- Page Content -->
    <div class="content container-fluid sidebarRight animated fadeInUp mail compose-wrapper">
        @foreach($errors->all() as $error) {!! $error !!}} @endforeach
        <div class="error">
            <span></span>
        </div>
        <div class="panel panel-white">
            <div class="panel-body">
                <div class="row"></div>
                <div class="row">
                    <div class="col-sm-9 col-md-10">
                        <div class="compose-container">
                            <form class="form-horizontal" role="form" id="banner" action="{{url('banner_update/'.$banners->id)}}" method="POST" enctype="multipart/form-data">
                                {!! csrf_field() !!}

                                <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist" style="margin-bottom: 25px;">
                                    @foreach($banners->getBanner as $k=>$banner)
                                    <li class="nav-item @if($k == 0)active @endif">
                                        <a class="nav-link active" id="pills-{{$banner->lang}}-tab" data-toggle="pill" href="#pills-{{$banner->lang}}" role="tab" aria-controls="pills-{{$banner->lang}}" aria-selected="true">
                                            {{$banner->lang}}
                                        </a>
                                    </li>
                                    @endforeach
                                </ul>
                                <div class="tab-content" id="pills-tabContent">
                                    @foreach($banners->getBanner as $k=>$banner)
                                    <div class="tab-pane fade @if($k == 0)active @endif in" id="pills-{{$banner->lang}}" role="tabpanel" aria-labelledby="pills-{{$banner->lang}}-tab">
                                        <div class="form-group">
                                            <label class="col-sm-1 control-label">Başlıq ({{$banner->lang}})</label>
                                            <div class="col-sm-11">
                                                <input type="text" name="basliq[]" value="{{$banner->title}}" class="form-control" required />
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-1 control-label">Mətn ({{$banner->lang}})</label>
                                            <div class="col-sm-11 col-sm-offset-1">
                                                <textarea id="ckeditor{{$k}}" name="text[]">{{$banner->text}}</textarea>
                                                <script>
                                                    CKEDITOR.replace("ckeditor{{$k}}", {
                                                        filebrowserUploadUrl: "/assets/filebrowser/plugin.js",
                                                    });
                                                </script>
                                            </div>
                                        </div>
                                        <input type="hidden" value="{{$banner->lang}}" name="lang[]" />
                                    </div>
                                    @endforeach
                                    
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-1 control-label">Foto</label>
                                    <img src="{{asset('public/Banner/'.$banners->img)}}" style="width:150px;margin-bottom:10px;">
                                    <input type="hidden" name="old_img" value="{{$banners->img}}">
                                    <div class="col-sm-11">
                                        <input type="file" name="img" value="" class="form-control" />
                                    </div>
                                </div>

                                <button style="margin-right: 15px; margin-top: 10px; float: right;" class="btn btn-success">Add</button>
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
