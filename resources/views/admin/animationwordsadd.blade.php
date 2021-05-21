@extends('layouts.admin')

@section('content')

    <aside class="content-wrapper sidebarLeft">

        <!-- Page Content -->
        <div class="content container-fluid sidebarRight animated fadeInUp">

            <div class="row">


                <div class="col-sm-12">
                    @if(Session::has('message'))
                        <div class="alert alert-success">{{ Session::get('message') }}</div>
                    @endif
                    <div class="panel panel-white">
                        <div class="panel-body content-title-container">
                            <div class="right">
                                <ol class="breadcrumb breadcrumb-theme breadcrumb-sm breadcrumb-blue">
                                    <li><a href="/home">Ana Səhifə</a></li>

                                </ol>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-sm-12">
                    <div class="panel panel-white">
                        <div class="panel-heading">
                            <h3 class="panel-title">Tənzimləmələr</h3>
                        </div>

                        <div class="panel-body">

                            <table id="table-1" class="table table-bordered table-striped">
                                <thead>
                                <th>Phone</th>
                                <th>Email</th>
                                <th>Fax</th>
                                <th>Adress</th>
                                <th> Edit</th>


                                </thead>
                                <tbody>

                                @foreach($word as $yansona)

                                    <tr>
                                        <td> {{ $yansona->nomre }} </td>
                                        <td> {{ $yansona->email }} </td>
                                        <td> {{ $yansona->fax }} </td>
                                        <td> {{ $yansona->adress }} </td>

                                        <td>
                                            <a href="{{asset('/animationwordsadd/'.$yansona->id.'/edit')}}"
                                               style="margin-left:30px; color:green;">Edit</a>
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
