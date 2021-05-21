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
                                      action="{{url('career_update/'.$career->id)}}" method="POST"
                                      enctype="multipart/form-data">
                                    {!! csrf_field() !!}

                                    
                                    
                                        
                                            <div class="form-group">
                                                <label class="col-sm-1 control-label">Baş.tarix</label>
                                                <div class="col-sm-11">
                                                    <input type="date" name="start_date" value="{!! $career->start_date !!}"
                                                           class="form-control" required>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="col-sm-1 control-label">Bit.tarix</label>
                                                <div class="col-sm-11">
                                                    <input type="date" name="end_date" value="{!! $career->end_date !!}"
                                                           class="form-control" required>
                                                </div>
                                            </div>

                                            <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist"
                                        style="margin-bottom: 25px">
                                        @foreach($career->getCareer as $k=>$care)
                                        <li class="nav-item @if($k == 0)active @endif">
                                            <a class="nav-link @if($k == 0)active @endif" id="pills-home-tab" data-toggle="pill"
                                               href="#pills-{{$k}}" role="tab" aria-controls="pills-{{$k}}"
                                               aria-selected="true">{{$care->lang}}</a>
                                        </li>
                                        @endforeach
                                        
                                    </ul>
                                    <div class="tab-content" id="pills-tabContent">
                                        @foreach($career->getCareer as $k=>$carer)
                                        <div class="tab-pane fade @if($k == 0)active @endif in" id="pills-{{$k}}" role="tabpanel"
                                             aria-labelledby="pills-home-tab">
                                            <div class="form-group">
                                                <label class="col-sm-1 control-label">Başlıq({{$carer->lang}})</label>
                                                <div class="col-sm-11">
                                                    <input type="text" name="title[]" value="{!! $carer->title !!}"
                                                           class="form-control" required>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-sm-1 control-label">Qısa Mətn({{$carer->lang}})</label>
                                                <div class="col-sm-11">
                                                    <textarea id="ckeditor{{$k}}0"
                                                      name="short_text[]">{!! $carer->short_text !!}</textarea>
                                                    <script>
                                                        CKEDITOR.replace('ckeditor{{$k}}0', {
                                                            filebrowserUploadUrl: '/assets/filebrowser/plugin.js'
                                                        });
                                                    </script>
                                                </div>
                                                
                                            </div>
                                            <div class="form-group">
                                                <label class="col-sm-1 control-label">Mətn({{$carer->lang}})</label>
                                                <div class="col-sm-11">
                                                    <textarea id="ckeditor{{$k}}"
                                                      name="text[]">{!! $carer->text !!}</textarea>
                                                    <script>
                                                        CKEDITOR.replace('ckeditor{{$k}}', {
                                                            filebrowserUploadUrl: '/assets/filebrowser/plugin.js'
                                                        });
                                                    </script>
                                                </div>
                                                
                                            </div>
                                            <input type="hidden" value="{{$carer->lang}}" name="lang[]">
                                        </div>
                                        @endforeach
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
