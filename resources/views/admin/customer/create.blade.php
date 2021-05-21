@extends('layouts.admin')

@section('content')

    <aside class="content-wrapper sidebarLeft">

        <!-- Page Content -->
        <div class="content container-fluid sidebarRight animated fadeInUp">

            <div class="row">

                <div class="col-sm-12">

                </div>

                <div class="col-sm-12">


                    <form class="form-horizontal" role="form" action="{!! URL::action('CustomerController@store') !!}" method="POST" enctype="multipart/form-data">

                        {!! csrf_field() !!}


                        <div class="form-group">
                            <label class="col-sm-1 control-label">Image</label>
                            <div class="col-sm-11 col-sm-offset-1">

                                <input type="file" name="photos[]" value="" multiple="true">

                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-1 control-label">Url</label>
                            <div class="col-sm-11 col-sm-offset-1">
                              <input type="text" name="url" value="">
                            </div>
                        </div>

                        <button style="float:right" class="btn btn-success">Add</button>

                    </form>

                </div>

            </div>

        </div>
        </div>

        <!-- End Page Content -->

    </aside>




@endsection
