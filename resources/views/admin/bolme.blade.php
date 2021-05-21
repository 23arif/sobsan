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

                                    <li class="active"><a>Bütün Kateqoriyalar</a></li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-sm-5">
                    <div class="panel panel-white">
                        <div class="panel-heading">
                            <h3 class="panel-title">Kateqoriyalar <a href="{{asset('bolme/create')}}"> Əlavə et</a>
                            </h3>
                        </div>
                        <div class="panel-body">

                            <table id="table-1" class="table table-bordered table-striped">
                                <thead>

                                </thead>
                                <tbody>
                                @foreach($cat as $children)
                                    <tr style="font-size: 18px">
                                        <td>
                                            [{{ $children->id }}]<b
                                                style="font-size: 24px">
                                                <a href="{{asset('/bolme/'.$children->id.'/edit')}}">{{$children->getCat[0]->name }}</a>
                                                <a
                                                    style="font-size:14px;color:red"
                                                    href="{{asset('/bolme/'.$children->id.'/del')}}">Delete</a></b>
                                            <br/>

                                        </td>
                                    @if(isset($children->children[0]))
                                        @foreach($children->children as $child)
                                            <tr>
                                                <td>&nbsp;&nbsp; --
                                                    <a href="{{asset('/bolme/'.$child->id.'/edit')}}">{{$child->getCat[0]->name}}</a>
                                                    <a style="font-size:14px;color:red;float: right"
                                                       href="{{asset('/bolme/'.$child->id.'/del')}}">Delete</a></td>
                                            @if(isset($child->children[0]))
                                                @foreach($child->children as $c)
                                                    <tr>
                                                        <td>&nbsp;&nbsp;&nbsp;&nbsp; --
                                                            <a href="{{asset('/bolme/'.$c->id.'/edit')}}">{{$c->getCat[0]->name}}</a>
                                                            <a style="font-size:14px;color:red;float: right"
                                                               href="{{asset('/bolme/'.$c->id.'/del')}}">Delete</a></td>
                                                    </tr>
                                                    @endforeach
                                                    @endif
                                                    </tr>
                                                    @endforeach
                                                    @endif
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
