@extends('layouts.admin') @section('content')

    <aside class="content-wrapper collapse sidebarLeft">

        <!-- Page Content -->
        <div class="content container-fluid sidebarRight animated fadeInUp mail compose-wrapper">

            @foreach($errors->all() as $error) {!! $error !!}} @endforeach

            <div class="panel panel-white">
                <div class="panel-body">

                    <div class="row">

                    </div>

                    <div class="row">

                        <div class="col-sm-9 col-md-10">

                            <div class="compose-container">

                                <form class="form-horizontal" role="form"
                                      action="{!! URL::action('VideoGalleryController@update',$video->id) !!}" method="POST"
                                      enctype="multipart/form-data">

                                    {!! csrf_field() !!}
                                    <input type="hidden" name="old_thumbnail" value="{{$video->thumbnail}}">
                                    <div class="form-group">
                                        <label class="col-sm-1 control-label">Foto</label>
                                        <div class="col-sm-11">
                                            <img src="{{asset('/public/Gallery/'.$video->thumbnail)}}" alt="" width="150" height="150">
                                            <input type="file" name="thumbnail" value=""
                                                   class="form-control">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-sm-1 control-label">Video Link</label>
                                        <div class="col-sm-11">
                                            <input type="text" name="path" value="{{$video->path}}"
                                                   class="form-control">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-sm-1 control-label">Video title(Az)</label>
                                        <div class="col-sm-11">
                                            <input type="text" name="title_az" value="{{$video->title_az}}"
                                                   class="form-control">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-sm-1 control-label">Video title(En)</label>
                                        <div class="col-sm-11">
                                            <input type="text" name="title_en" value="{{$video->title_en}}"
                                                   class="form-control">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-sm-1 control-label">Video title(Ru)</label>
                                        <div class="col-sm-11">
                                            <input type="text" name="title_ru" value="{{$video->title_ru}}"
                                                   class="form-control">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-sm-1 control-label"></label>
                                        <div class="col-sm-11">
                                            <label class="control-label">??sas</label>
                                            <input @if($video->important == 1) checked="" @endif type="checkbox" name="important"> &nbsp;&nbsp;&nbsp;
                                            
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
