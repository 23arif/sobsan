@extends('layouts.admin')

@section('content')

    <aside class="content-wrapper sidebarLeft">

        <!-- Page Content -->
        <div class="content container-fluid sidebarRight animated fadeInUp">

            <div class="row">

                <div class="col-sm-12">

                    <div class="panel panel-white">
                        <div class="panel-body content-title-container">
                            <div class="right">
                                <ol class="breadcrumb breadcrumb-theme breadcrumb-sm breadcrumb-blue">

                                    <li class="active"><a>Bütün Rənglər</a></li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-sm-5">
                    <div class="panel panel-white">
                        <div class="panel-heading">
                            <h3 class="panel-title">Rənglər <a href="{{asset('color/create')}}"> Əlavə et</a>
                            </h3>
                        </div>
                        <div class="panel-body">

                            <table id="table-1" class="table table-bordered table-striped">
                                <thead>

                                </thead>
                                <tbody>
                                @foreach($colors as $color)
                                    <tr style="font-size: 18px">
                                        <td>
                                            [{{ $color->id }}]<b
                                                style="font-size: 24px">
                                                <a href="{{asset('/color/'.$color->id.'/edit')}}">{{$color->color_n_az }}</a>
                                                <a
                                                    style="font-size:14px;color:red"
                                                    href="{{asset('/color/'.$color->id.'/del')}}">Delete</a></b>
                                            <br/>

                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>

                        </div>
                    </div>
                </div>

            </div>

        </div>
        <!-- End Page Content -->

    </aside>
@endsection
