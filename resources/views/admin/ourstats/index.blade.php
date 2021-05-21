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
                                <!-- <ol class="breadcrumb breadcrumb-theme breadcrumb-sm breadcrumb-blue">
                                    <li><a href="/">Ana Səhifə</a></li>
                                    <li class="active"><a>Məlumatlar</a></li>
                                </ol> -->
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-sm-12">
                    <div class="panel panel-white">
                        <div class="panel-heading">
                        </div>
                        <div class="panel-body">

                            <table id="table-1" class="table table-bordered table-striped">
                                <thead>
                                <th>Icon</th>
                                <th>Numbers</th>
                                <th>Words</th>
                                <th>Edit</th>
                                </thead>
                                <tbody>


                                  @foreach($our as $new)

                                  <tr>
                                    <td>
                                      {{ $new->icon }}
                                    </td>
                                    <td>
                                      {{ $new->number }}
                                    </td>
                                    <td>
                                      {{ $new->word }}
                                    </td>

                                  <td><a href="/ourstats/{!!$new->id !!}/edit" style="margin-left:30px; color:red;" >Edit</a> </td>

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
