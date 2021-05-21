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
                                    <li class="active"><a>Karyera</a></li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-sm-12">
                    <div class="panel panel-white">
                        <div class="panel-heading">
                            <h3 class="panel-title">Karyera <a href="{{asset('career_add')}}"> Əlavə et</a></h3>
                        </div>
                        <div class="panel-body">

                            <table id="table-1" class="table table-bordered table-striped">
                                <thead>
                                <th>Başlıq </th>
                                <th>Baş.tarixi</th>
                                <th>Bit.tarixi</th>
                                <th>Sil və ya Düzəliş et</th>
                                </thead>
                                <tbody>

                                @foreach($careers as $career)

                                    <tr>
                                        <td>
                                            {{$career->getCareer->where('lang','az')->first()->title}}
                                        </td>
                                        <td>{{$career->start_date}}</td>
                                        <td>{{$career->end_date}}</td>
                                        <td><a href="{{asset('career_delete/'.$career->id)}}"
                                               style="margin-left:30px; color:red;">Sil</a>
                                            <a href="{{asset('career_edit/'.$career->id)}}"
                                               style="margin-left:30px; color:green;">Düzəliş et</a></td>

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
