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
                                    <li class="active"><a>Sifarişlər</a></li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-sm-12">
                    <div class="panel panel-white">
                        <div class="panel-heading">
                            <h3 class="panel-title">Sifarişlər</h3>
                        </div>
                        <div class="panel-body">

                            <table class="table table-striped- table-bordered table-hover table-checkable"
                                   id="kt_table_1">
                                <thead>
                                <tr class="text-center">
                                    <th>ID</th>
                                    <th>Ad</th>
                                    <th>Şirkət</th>
                                    <th>Status</th>
                                    <th>Ödəniş növü</th>
                                    <th>Sifarış vaxtı</th>
                                    <th>Yenilənmə vaxtı</th>
                                    <th></th>
                                </tr>
                                </thead>
                                <tbody id="sortable" class="ui-sortable">
                                    @foreach($orders as $l=>$order)
                                    @php($l++)
                                <tr id="1086" class="text-center text-success">
                                    <td>{{$l}}</td>
                                    <td>{{$order->name}}</td>
                                    <td>
                                         @if(\App\User::where('id',$order->user_id)->first())
                                         @if(\App\User::where('id',$order->user_id)->first()->company_name == null)
                                         -
                                         @elseif(\App\User::where('id',$order->user_id)->first()->company_name)
                                            {{\App\User::where('id',$order->user_id)->first()->company_name}}
                                         @endif
                    @else
                        -
                    @endif
                                    </td>
                                    <td>
                                        @if($order->order_status == 1)
                                        <div class="order-status delivered-order">Çatdırılıb</div>
                                        @elseif($order->order_status == 0)
                                        <div class="order-status pending-order">Gözləyir</div>
                                        @else
                                        <div class="order-status canceled-order">Imtina</div>
                                        @endif
                                    </td>
                                    <td>
                                        @if($order->order_type ==0)
                                        Individual
                                        @else
                                        Korporativ 
                                        @endif
                                    </td>
                                    <td>{{$order->order_date}}</td>
                                    <td>{{$order->updated_at}}</td>
                                    <td>
                                        <div class="btn-group" role="group" aria-label="First group" style="display:flex!important">
                                            <a href="{{asset('order_show/'.$order->id)}}"
                                               class="btn btn-warning order-btn"><i class="la la-paste"></i><i class="fa fa-eye" style="color:#fff" aria-hidden="true"></i></a>
                                            <a href="{{asset('order_delete/'.$order->id)}}"
                                               onclick="return confirm('Are you sure you want to delete this item?');"
                                               class="btn btn-danger order-btn"><i class="flaticon-delete"></i><i class="fa fa-trash-o" style="color:#fff" aria-hidden="true"></i></a>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                                </tbody>
                            </table>
                            {!! $orders->render() !!}
                        </div>
                    </div>

                </div>
            </div>

        </div>
        <!-- End Page Content -->

    </aside>
@endsection
