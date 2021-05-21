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
                                    <li class="active"><a>Promocode</a></li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-sm-12">
                    <div class="panel panel-white">
                        <div class="panel-heading">
                            <h3 class="panel-title">Promocode <a href="{{asset('promo_add')}}"> Əlavə et</a></h3>
                        </div>
                        <div class="panel-body">

                            <table id="table-1" class="table table-bordered table-striped">
                                <thead>
                                <th>#</th>
                                <th>Məbləğ</th>
                                <th>Növ</th>
                                <th>Kateqoriya</th>
                                <th>Başlama tarixi</th>
                                <th>Bitmə tarixi</th>
                                <th>Sil və ya Düzəliş et</th>
                                </thead>
                                <tbody>

                                @foreach($promos as $k=>$promo)

                                    <tr>
                                        <td>
                                            {{$k+=1}}
                                        </td>
                                        <td>
                                            {{$promo->amount}}
                                        </td>
                                        <td>
                                            @if($promo->type == 0)
                                                AZN
                                            @else
                                                %
                                            @endif
                                        </td>
                                        <td>
                                            {{$promo->getPromoCat->getCat->first()->name}}
                                        </td>
                                        <td>
                                            {{$promo->start}}
                                        </td>
                                        <td>
                                            {{$promo->end}}
                                        </td>
                                        <td><a href="{{asset('promo_delete/'.$promo->id)}}"
                                               style="margin-left:30px; color:red;">Sil</a>
                                            <a href="{{asset('promo_edit/'.$promo->id)}}"
                                               style="margin-left:30px; color:green;">Düzəliş et</a></td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>

                        </div>
                    </div>
                    {{$promos->render()}}
                </div>
            </div>

        </div>
        <!-- End Page Content -->

    </aside>
@endsection
