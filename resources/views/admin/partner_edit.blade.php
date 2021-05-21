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
                                      action="{!! URL::action('PartnerController@update',$partner->id) !!}" method="POST"
                                      enctype="multipart/form-data">

                                    {!! csrf_field() !!}

                                    <input type="hidden" name="old_img" value="{{$partner->img}}">

                                    <div class="form-group">
                                        <label class="col-sm-1 control-label">Partnyor Şəkli</label>
                                        <div class="col-sm-11">
                                            <input type="file" id="removefile" name="img" value="" class="form-control">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-sm-1 control-label">Partnyor adı</label>
                                        <div class="col-sm-11">
                                            <input type="text" name="title" value="{{$partner->title}}"
                                                   class="form-control">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-sm-1 control-label">Partnyor linki</label>
                                        <div class="col-sm-11">
                                            <input type="text" name="link" value="{{$partner->link}}"
                                                   class="form-control">
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
