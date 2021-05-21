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
                                    <li><a href="index-2.html">Ana Səhifə</a></li>
                                    <li class="active"><a>Admin Siyahısı</a></li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-sm-12">
                    <div class="panel panel-white">

                        <div class="panel-body">

                            <table id="table-1" class="table table-bordered table-striped">
                                <thead>
                                <th>Admin</th>
                                <th>E-mail</th>
                                <th>Qeydiyyat Tarixi</th>


                                </thead>
                                <tbody>


                              @foreach($admins as $admin)

                                  <tr><td> {!! $admin->name !!} </td>
                                      <td>{!! $admin->email !!}</td>
                                      <td>{!! $admin->updated_at !!}</td>
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
