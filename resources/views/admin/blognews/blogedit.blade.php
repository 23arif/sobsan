@extends('layouts.admin')

@section('content')
<aside class="content-wrapper collapse sidebarLeft">

    <!-- Page Content -->
    <div class="content container-fluid sidebarRight animated fadeInUp mail compose-wrapper">

        @foreach($errors->all() as $error)

            {!! $error !!}}

        @endforeach

        <div class="panel panel-white">
            <div class="panel-body">

                <div class="row">


                </div>

                <div class="row">



                    <div class="col-sm-9 col-md-10">

                        <div class="compose-container">

                            <form class="form-horizontal" role="form" action="{!! URL::action('BlogNewsController@update',$blogNewsEdit->blog_id) !!}" method="POST">

                                {!! csrf_field() !!}

                                <input type="hidden"  name="_method" value="patch">

                              @if(Auth::user()->role == 2)
                              <div class="form-group">
                                <label class="col-sm-1 control-label">STATUS</label>
                                <div class="col-sm-11">
                              <select style="width:49%" class="form-control" id="kate" name="status">

                                  <option value="1"><b>Aktiv</b></option>
                                  <option value="0"><b>Deaktiv</b></option>

                              </select>
                              </div>
                                  </div>
                                  @endif
                              </br>
                              </br>
                              </br>
                                <div class="form-group">

                                    <label class="col-sm-1 control-label">Başlıq</label>
                                    <div class="col-sm-11">
                                        <input type="text" name="blog_name"  value="{!! $blogNewsEdit->blog_name !!}" class="form-control">
                                    </div>
                                </div>


                              <div class="form-group">
                                  <label class="col-sm-1 control-label">Tam Təsvir</label>
                                  <div class="col-sm-11 col-sm-offset-1">
                                      <textarea id="ckeditor1" name="blog_desc">{!! $blogNewsEdit->blog_desc !!}</textarea>
                                  </div>
                              </div>




                        <button style="float:right;margin-top:20px" class="btn btn-success">Əlavə Et</button>
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
