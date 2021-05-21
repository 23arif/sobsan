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
                                      action="{{url('branch_update/'.$branch->id)}}" method="POST"
                                      enctype="multipart/form-data">
                                    {!! csrf_field() !!}

                                    <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist"
                                        style="margin-bottom: 25px">
                                        @foreach($branch->getBranch as $k=>$branc)
                                        <li class="nav-item @if($k==0)active @endif">
                                            <a class="nav-link active" id="pills-home-tab" data-toggle="pill"
                                               href="#pills-{{$k}}" role="tab" aria-controls="pills-{{$k}}"
                                               aria-selected="true">{{ucfirst($branc->lang)}}</a>
                                        </li>
                                        @endforeach
                                        
                                    </ul>
                                    <div class="tab-content" id="pills-tabContent">
                                        @foreach($branch->getBranch as $k=>$branchs)
                                        <div class="tab-pane fade @if($k==0)active @endif in" id="pills-{{$k}}" role="tabpanel"
                                             aria-labelledby="pills-home-tab">
                                            <div class="form-group">
                                                <label class="col-sm-1 control-label">Filial adı({{$branchs->lang}})</label>
                                                <div class="col-sm-11">
                                                    <input type="text" name="name[]" value="{{$branchs->name}}"
                                                           class="form-control" required>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-sm-1 control-label">Filial ünvanı({{$branchs->lang}})</label>
                                                <div class="col-sm-11">
                                                    <input type="text" name="address[]" value="{{$branchs->address}}"
                                                           class="form-control" required>
                                                </div>
                                                
                                            </div>
                                            <input type="hidden" value="{{$branchs->lang}}" name="lang[]">
                                        </div>
                                        
                                        @endforeach
                                    </div>

                                    <div class="form-group">
                                        <label class="col-sm-1 control-label">Telefon nömrəsi</label>
                                        <div class="col-sm-11">
                                            <input type="text" name="phone_number" value="{{$branch->phone_number}}"
                                                           class="form-control" required>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-sm-1 control-label">Xəritə Linki</label>
                                        <div class="col-sm-11">
                                            <input type="text" name="map_link" value="{{$branch->map_link}}"
                                                           class="form-control" required>
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
