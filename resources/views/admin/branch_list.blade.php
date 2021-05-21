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
                                    <li class="active"><a>Filiallar</a></li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-sm-12">
                    <div class="panel panel-white">
                        <div class="panel-heading">
                            <h3 class="panel-title">Filiallar <a href="{{asset('branch_add')}}"> Əlavə et</a></h3>
                        </div>
                        <div class="panel-body">

                            <table id="table-1" class="table table-bordered table-striped">
                                <thead>
                                <th>Filial adı</th>
                                <th>Filial ünvanı</th>
                                <th>Sil və ya Düzəliş et</th>
                                </thead>
                                <tbody>

                                @foreach($branches as $branch)

                                    <tr>
                                        <td>
                                            {{$branch->getBranch->where('lang','az')->first()->name}}
                                        </td>
                                        <td>
                                            {{ $branch->getBranch->where('lang','az')->first()->address }}
                                        </td>
                                        <td><a href="{{asset('branch_delete/'.$branch->id)}}"
                                               style="margin-left:30px; color:red;">Sil</a>
                                            <a href="{{asset('branch_edit/'.$branch->id)}}"
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
