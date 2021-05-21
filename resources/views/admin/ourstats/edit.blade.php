@extends('layouts.admin')

@section('content')

<style media="screen">
input{
  width: 500px;
  height: 59px;
}
</style>

    <aside class="content-wrapper sidebarLeft">

        <!-- Page Content -->
        <div class="content container-fluid sidebarRight animated fadeInUp">

            <div class="row">

                <div class="col-sm-12">

                </div>

                <div class="col-sm-12">


                    <form class="form-horizontal" role="form" action="{!! URL::action('OurStatsController@update',$our->id) !!}" method="POST">

                        {!! csrf_field() !!}
                        <input type="hidden" name="_method" value="PUT" >

                        <div class="form-group">
                            <label class="col-sm-1 control-label">icon</label>
                            <div class="col-sm-11 col-sm-offset-1">

                              <input type="text" name="icon" value="{{ $our->icon }}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-1 control-label">number</label>
                            <div class="col-sm-11 col-sm-offset-1">

                              <input type="text" name="number" value="{{ $our->number }}">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-1 control-label">english word</label>
                            <div class="col-sm-11 col-sm-offset-1">

                              <input type="text" name="word" value="{{ $our->word }}">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-1 control-label">russian word</label>
                            <div class="col-sm-11 col-sm-offset-1">

                              <input type="text" name="ruword" value="{{ $our->ruword }}">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-1 control-label">azerbaijan  word</label>
                            <div class="col-sm-11 col-sm-offset-1">

                              <input type="text" name="azword" value="{{ $our->azword }}">

                              <button style="float:center;margin-left:20px;" class="btn btn-success">Əlavə Et</button>

                            </div>
                        </div>


                    </form>

                </div>

            </div>

        </div>
        </div>

        <!-- End Page Content -->

    </aside>




@endsection
