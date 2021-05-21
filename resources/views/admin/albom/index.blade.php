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
                            <h3 class="panel-title">Qalereya -> <a href="{{asset('/albom/create')}}"> Əlavə et</a></h3>
                        </div>
                        <div class="panel-body">

                            <table id="table-1" class="table table-bordered table-striped">
                                <thead>
                                <th>Şəkil</th>
                                
                                <th>Video</th>
                                <th>Sil</th>

                                </thead>
                                <tbody>


                                  @foreach($albom as $new)

                                  <tr>
                                    <td>
                                      {{ $new->fotolent }}
                                    </td>
                                   
                                    <td>
                                      {{ $new->video }}
                                    </td>

                                  <td><a href="{{asset('/albom/'.$new->id.'/del')}}" style="margin-left:30px; color:red;" >Sil</a> </td>

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
