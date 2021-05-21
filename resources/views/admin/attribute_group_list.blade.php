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

                                    <li class="active"><a>Bütün Atribut Qrupları</a></li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-sm-12">
                    <div class="panel panel-white">
                        <div class="panel-heading">
                            <h3 class="panel-title">Atribut Qrupları <a href="{{asset('attribute_group_add')}}"> Əlavə
                                    et</a>
                            </h3>
                        </div>
                        <div class="panel-body">
                            <table id="table-1" class="table table-bordered table-striped">
                                <thead>
                                <th></th>
                                <th>ID</th>
                                <th>Kateqoriya</th>
                                <th>Atribut Qrupu adı</th>
                                <th></th>
                                <th></th>
                                </thead>
                                <tbody>
                                @foreach($groups as $k=>$group)
                                    <tr style="font-size: 18px" class="row1" data-id="{{$group->id}}">
                                        <td style="cursor: move">
                                            <i class="fa fa-sort" aria-hidden="true"></i>
                                        </td>
                                        <td>{{$group->id}}</td>
                                        <td>{{$group->getAttrCat->first()->getCat->first()->name}}</td>
                                        <td>
                                            {{$group->group_n_az}}
                                        </td>
                                        <td><a style="color:#fff" href="{{asset('/attribute_group_edit/'.$group->id)}}"
                                               class="btn btn-success">Edit</a></td>
                                        <td>
                                            <a style="color:#fff" class="btn btn-danger"
                                               href="{{asset('/attribute_group_delete/'.$group->id)}}">Delete</a>
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
@section('js')
    <script>
        $( "tbody" ).sortable({
            items: "tr",
            cursor: 'move',
            opacity: 0.6,
            update: function() {
                sendOrderToServer();
            }
        });

        function sendOrderToServer() {
            var order = [];
            $('tr.row1').each(function(index,element) {
                order.push({
                    id: $(this).attr('data-id'),
                    position: index+1
                });
            });
            $.ajax({
                type: "POST",
                dataType: "json",
                url: "{{route('AttrGroupSort')}}",
                data: {
                    order: order,
                    _token: "{{ csrf_token() }}"
                },
                success: function(response) {
                    if (response.status == "success") {
                        console.log(response);
                    } else {
                        console.log(response);
                    }
                }
            });
        }


        {{--$('tbody').sortable({--}}
        {{--    stop: function (e, ui) {--}}
        {{--        $.ajax({--}}
        {{--            url: "{{route('AttrGroupSort')}}",--}}
        {{--            type: 'POST',--}}
        {{--            data: {--}}
        {{--                '_token': "{{ csrf_token() }}",--}}
        {{--                'tableId':ui.item.attr('id'),--}}
        {{--                'tableIndex':ui.item.index()--}}
        {{--            },--}}
        {{--            success: function (response) {--}}

        {{--            }--}}
        {{--        });--}}
        {{--    }--}}
        {{--});--}}
    </script>
@endsection
