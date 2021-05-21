@extends('layouts.admin')
@section('content')


    <aside class="content-wrapper collapse sidebarLeft">

        <!-- Page Content -->
        <div class="content container-fluid sidebarRight animated fadeInUp mail compose-wrapper">

            @foreach($errors->all() as $error)

                {!! $error !!}}

            @endforeach
            <div class="error">
                <span></span>
            </div>
            <div class="panel panel-white">
                <div class="panel-body">
                    <div class="row">
                    </div>
                    <div class="row">
                        <div class="col-sm-9 col-md-10">
                            <div class="compose-container">
                                <form class="form-horizontal" role="form" id="banner"
                                      action="{{url('brend_update/'.$brend->id)}}" method="POST"
                                      enctype="multipart/form-data">
                                    {!! csrf_field() !!}

                                    
                                    
                                        
                                            <div class="form-group">
                                                <label class="col-sm-1 control-label">Brend ad</label>
                                                <div class="col-sm-11">
                                                    <input type="text" name="name" value="{{$brend->name}}"
                                                           class="form-control" required>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="col-sm-1 control-label">Foto</label>
                                                <img style="width:150px;" src="{{asset('public/brend/'.$brend->img)}}">
                                                <div class="col-sm-11">
                                                    <input type="file" name="img" value=""
                                                class="form-control">
                                                <input type="hidden" name="old_img" value="{{$brend->img}}">
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
