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

                            <form class="form-horizontal" role="form" action="{!! URL::action('FotoCateController@store') !!}" method="POST" enctype="multipart/form-data" files="true">

                                {!! csrf_field() !!}

                                <div class="col-md-8">
                                    <div class="form-group">
                                        <label>Tipi</label>
                                        <select name="type" class="form-control fotocate">
                                            <option value="photo">Seçin</option>
                                            <option value="photo">Foto</option>
                                            <option value="video">Video</option>
                                        </select>
                                    </div>
                                  
                                  
                                  	

                                    <div style="display:none" class="form-group photo">
                                        <label class="col-sm-1 control-label">Gallery</label>
                                        <input class="form-control" type="file" name="photos" value="" multiple="true">
                                    </div>

                                    <div style="display:none" class="form-group video">
                                        <label class="col-sm-1 control-label">Video</label>
                                        <input class="form-control" type="text" name="video" value="">
                                    </div>
                                </div>

                                

                                

                                

                                <script>
                                    function fotolent(checkboxElem) {
                                        if (checkboxElem.checked) {
                                            document.getElementById('fotolent').style = "display:block";
                                            document.getElementById('foto').value = 1;
                                        } else {
                                            document.getElementById('fotolent').style = "display:none";
                                            document.getElementById("removefile").value = "";
                                            document.getElementById('foto').value = 0;
                                        }
                                    }
                                </script>

                                <button style="margin-right:15px;margin-top:10px;float:right" class="btn btn-success">Add</button>

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