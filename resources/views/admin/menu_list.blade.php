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

                                    <li class="active"><a>Bütün Menular</a></li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-sm-5">
                    <div class="panel panel-white">
                        <div class="panel-heading">
                              <h3 class="panel-title">Menular <a href="{{asset('/menu/create')}}"> Əlavə et</a></h3>
                        </div>
                        <div class="panel-body">

                            <table id="table-1" class="table table-bordered table-striped">
                                <thead>

                                </thead>
                                <tbody>

                                  @foreach($menular as $menu)
                                    <tr style="font-size: 18px">
                                          <td>
                                            [{{ $menu->id }}]<b style="font-size: 24px"><a href="{{asset('/menu/'.$menu->id.'/edit')}}">{{ $menu->getMenu->first()->name }}</a> <a style="font-size:14px;color:red" href="/blog/menu_delete/{{ $menu->id }}">Delete</a></b>  <br/>

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
