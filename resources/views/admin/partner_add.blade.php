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
                                      action="{!! URL::action('PartnerController@store') !!}" method="POST"
                                      enctype="multipart/form-data">

                                    {!! csrf_field() !!}
                                    <div class="form-group">
                                        <label class="col-sm-1 control-label">Partnyor Şəkil</label>
                                        <div class="col-sm-11">
                                            <input class="form-control" type="file" id="removefile" name="img" value="">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-sm-1 control-label">Partnyor adı</label>
                                        <div class="col-sm-11">
                                            <input type="text" name="title" value=""
                                                   class="form-control">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-sm-1 control-label">Partnyor linki</label>
                                        <div class="col-sm-11">
                                            <input type="text" name="link" value=""
                                                   class="form-control">
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
