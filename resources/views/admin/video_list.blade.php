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
                                    <li class="active"><a>Videolar</a></li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-sm-12">
                    <div class="panel panel-white">
                        <div class="panel-heading">
                            <h3 class="panel-title">Videolar <a href="{{asset('video_add')}}"> Əlavə et</a></h3>
                        </div>
                        <div class="panel-body">

                            <table id="table-1" class="table table-bordered table-striped">
                                <thead>
                                <th>Video foto</th>
                                <th>Başlıq</th>
                                <th>Sil və ya Düzəliş et</th>
                                </thead>
                                <tbody>

                                @foreach($videos as $video)

                                    <tr>
                                        <td>
                                            <img style="width:100px;" src="{{asset('public/Gallery/'.$video->thumbnail)}}">
                                        </td>
                                        <td>{{$video->title_az}}</td>
                                        <td><a href="{{asset('video_delete/'.$video->id)}}"
                                               style="margin-left:30px; color:red;">Sil</a>
                                        <a href="{{asset('video_edit/'.$video->id)}}"
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
