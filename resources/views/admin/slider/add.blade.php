@extends('layouts.admin')

@section('content')

    <aside class="content-wrapper sidebarLeft">

        <!-- Page Content -->
        <div class="content container-fluid sidebarRight animated fadeInUp">

            <div class="row">

                <div class="col-sm-12">

                </div>

                <div class="col-sm-12">


                    <form class="form-horizontal" role="form" action="{!! URL::action('SliderController@store') !!}" method="POST" enctype="multipart/form-data">

                        {!! csrf_field() !!}


                        <div class="form-group">
                            <label class="col-sm-1 control-label">Slider</label>
                            <div class="col-sm-11 col-sm-offset-1">

                                <input type="file" class="form-control" name="photos[]" value="" multiple="true">

                            </div>
                        </div>
                        
                        
                        
                         <div class="form-group">
                            <label class="col-sm-1 control-label">Başlıq(Az)</label>
                            <div class="col-sm-11 col-sm-offset-1">

                                <input type="text" class="form-control" name="title_az" value="" multiple="true">

                            </div>
                        </div>
                        
                         <div class="form-group">
                            <label class="col-sm-1 control-label">Başlıq(En)</label>
                            <div class="col-sm-11 col-sm-offset-1">

                                <input type="text" class="form-control" name="title_en" value="" multiple="true">

                            </div>
                        </div>
                         <div class="form-group">
                            <label class="col-sm-1 control-label">Başlıq(RU)</label>
                            <div class="col-sm-11 col-sm-offset-1">

                                <input type="text" class="form-control" name="title_ru" value="" multiple="true">

                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label class="col-sm-1 control-label">Mətn(A)</label>
                            <div class="col-sm-11 col-sm-offset-1">

                                <input type="text" class="form-control" name="content_az" value="" multiple="true">

                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label class="col-sm-1 control-label">Mətn(En)</label>
                            <div class="col-sm-11 col-sm-offset-1">

                                <input type="text" class="form-control" name="content_en" value="" multiple="true">

                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-1 control-label">Mətn(Ru)</label>
                            <div class="col-sm-11 col-sm-offset-1">

                                <input type="text" class="form-control" name="content_ru" value="" multiple="true">

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
