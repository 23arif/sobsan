@extends('layouts.admin')

@section('content')

<aside class="content-wrapper sidebarLeft">

    <!-- Page Content -->
    <div class="content container-fluid sidebarRight animated fadeInUp">

        <div class="row">





            <div class="col-sm-12" >

<div class="col-sm-9 col-md-10">

    <div class="compose-container">

        <form class="form-horizontal" role="form" action="/blognews" method="POST">

            {!! csrf_field() !!}




          </br>
          </br>
          </br>
            <div class="form-group">

                <label class="col-sm-1 control-label">Başlıq</label>
                <div class="col-sm-11">
                    <input type="text" name="blog_name"  value="" class="form-control">
                </div>
            </div>


          <div class="form-group">
              <label class="col-sm-1 control-label">Tam Təsvir</label>
              <div class="col-sm-11 col-sm-offset-1">
                  <textarea id="ckeditor1" name="blog_desc"></textarea>
              </div>
          </div>




    <button style="float:right;margin-top:20px" class="btn btn-success">Əlavə Et</button>
    </form>


</div>

</div>

</div>

</div>
<!-- End Page Content -->

</aside>

@endsection
