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
                                    <li class="active"><a>Aksiyalar</a></li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-sm-12">
                    <div class="panel panel-white">
                        <div class="panel-heading">
                            <h3 class="panel-title">Aksiyalar <a href="{{asset('article_add')}}"> Əlavə et</a></h3>
                        </div>
                        <div class="panel-body">

                            <table id="table-1" class="table table-bordered table-striped">
                                <thead>
                                <th>Mətn şəkli</th>
                                <th>Sil və ya Düzəliş et</th>

                                </thead>
                                <tbody>


                                @foreach($articles as $article)

                                    <tr>
                                        <td>
                                            <img width="150" height="100"
                                                 src=" {{asset('public/article/'.$article->img)}}" alt="">
                                        </td>
                                        <td><a href="{{asset('article_delete/'.$article->id)}}"
                                               style="margin-left:30px; color:red;">Sil</a> <a
                                                href="{{asset('article_edit/'.$article->id)}}"
                                                style="margin-left:30px; color:green;">Düzəliş et</a></td>

                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
{{--                            {!! $articles->render() !!}--}}
                        </div>
                    </div>

                </div>
            </div>

        </div>
        <!-- End Page Content -->

    </aside>
@endsection
