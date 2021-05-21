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

                                    <li class="active"><a>Bütün Atributlar</a></li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-sm-12">
                    <div class="panel panel-white">
                        <div class="panel-heading">
                            <h3 class="panel-title">Atributlar <a href="{{asset('attribute_add')}}"> Əlavə et</a>
                            </h3>
                        </div>
                        <div class="panel-body">

                            <table id="table-1" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Kateqoriya</th>
                                    <th>Atribut Qrupu adı</th>
                                    <th>Atribut adı</th>
                                    <th></th>
                                    <th></th>
                                </tr>
                                </thead>
                                <tbody>
                                @php($k=0)
                                @foreach($attrGroups as $attrGroup)
                                    @if(count($attributes->where('attribute_id',$attrGroup->id)))
                                        <tr style="font-size: 18px">
                                            <td>{{$k+=1}}</td>
                                            <td>
                                                {{$attrGroup->getAttrCat->first()->getCat->first()->name}}
                                            </td>
                                            <td>
                                                {{$attrGroup->group_n_az}}
                                            </td>
                                            <td>
                                                @foreach($attributes->where('attribute_id',$attrGroup->id) as $attribute)
                                                    <p style="margin-bottom:10px;color: #fff"
                                                       class="btn btn-primary">{{$attribute->attribute_n_az}}</p>
                                                @endforeach
                                            </td>
                                            <td>
                                                <a href="{{asset('/attribute_edit/'.$attrGroup->id)}}"
                                                   class="btn btn-success" style="color:#fff">Edit</a>
                                            </td>
                                            <td>
                                                <a class="btn btn-danger"
                                                   style="color:#fff"
                                                   href="{{asset('/attribute_delete/'.$attrGroup->id)}}">Delete</a>
                                            </td>
                                        </tr>
                                    @endif
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
