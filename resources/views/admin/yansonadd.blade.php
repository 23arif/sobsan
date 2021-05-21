@extends('layouts.admin')

@section('content')

    <aside class="content-wrapper sidebarLeft">

        <!-- Page Content -->
        <div class="content container-fluid sidebarRight animated fadeInUp">

            <div class="row">

                <div class="col-sm-12">

                </div>

                <div class="col-sm-12">


                    <form class="form-horizontal" role="form"
                          action="{!! URL::action('YansonController@store') !!}" method="POST">

                        {!! csrf_field() !!}


                        <div class="form-group">
                            <label class="col-sm-1 control-label">Başlıq</label>
                            <div class="col-sm-11 col-sm-offset-1">

                                <input class="form-control" name="yanson" id="yanson" type="text" value="{{ old('yazi') }}">

                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-1 control-label">Yazı</label>
                            <div class="col-sm-11 col-sm-offset-1">

                                <input class="form-control" name="yazi" id="yanson" type="text" value="{{ old('yazi') }}">

                            </div>
                        </div>

                        <button style="float:right" class="btn btn-success">Əlavə Et</button>

                    </form>

                </div>

            </div>

        </div>
        </div>

        <!-- End Page Content -->

    </aside>




@endsection
