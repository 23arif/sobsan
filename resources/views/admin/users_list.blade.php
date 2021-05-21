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
                                    <li class="active"><a>İstifadəçilər</a></li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-sm-12">
                    <div class="panel panel-white">
                        <div class="panel-heading">
                            <h3 class="panel-title">İstifadəçilər</h3>
                        </div>
                        <div class="panel-body">

                            <table class="table table-striped- table-bordered table-hover table-checkable"
                                   id="kt_table_1">
                                <thead>
                                <tr class="text-center">
                                    <th>#</th>
                                    <th>Ad</th>
                                    <th>Şirkət</th>
                                    <th>Email</th>
                                    <th>Ünvan</th>
                                    <th>Şəhər</th>
                                    <th>Telefon</th>
{{--                                    <th>Status</th>--}}
                                </tr>
                                </thead>
                                <tbody id="sortable" class="ui-sortable">
                                @foreach($users as $l=>$user)
                                    <tr id="1086" class=" text-success">
                                        <td>{{ $users->firstItem() + $l }}</td>
                                        <td>{{$user->name}}</td>
                                        <td>{{$user->company_name}}</td>
                                        <td>{{$user->email}}</td>
                                        <td>{{$user->address}}</td>
                                        <td>{{$user->city}}</td>
                                        <td>{{$user->telefon}}</td>
{{--                                        <td>--}}
{{--                                            <label class="switch">--}}
{{--                                                <input type="checkbox" @if($user->active == 1) checked @endif onchange="activUser(this,'{{$user->id}}')">--}}
{{--                                                <span class="slider round"></span>--}}
{{--                                            </label>--}}
{{--                                        </td>--}}
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            {!! $users->render() !!}
                        </div>
                    </div>

                </div>
            </div>

        </div>
        <!-- End Page Content -->
        <style>
            .switch {
                position: relative;
                display: inline-block;
                width: 60px;
                height: 34px;
            }

            .switch input {
                opacity: 0;
                width: 0;
                height: 0;
            }

            .slider {
                position: absolute;
                cursor: pointer;
                top: 0;
                left: 0;
                right: 0;
                bottom: 0;
                background-color: #ccc;
                -webkit-transition: .4s;
                transition: .4s;
            }

            .slider:before {
                position: absolute;
                content: "";
                height: 26px;
                width: 26px;
                left: 4px;
                bottom: 4px;
                background-color: white;
                -webkit-transition: .4s;
                transition: .4s;
            }

            input:checked + .slider {
                background-color: #2196F3;
            }

            input:focus + .slider {
                box-shadow: 0 0 1px #2196F3;
            }

            input:checked + .slider:before {
                -webkit-transform: translateX(26px);
                -ms-transform: translateX(26px);
                transform: translateX(26px);
            }

            /* Rounded sliders */
            .slider.round {
                border-radius: 34px;
            }

            .slider.round:before {
                border-radius: 50%;
            }
        </style>
    </aside>
@endsection
@section('js')
{{--    <script>--}}
{{--        function activUser(t, userId) {--}}
{{--            $.ajax({--}}
{{--                url: "{{route('activateUser')}}",--}}
{{--                type: 'POST',--}}
{{--                data: {--}}
{{--                    '_token': "{{ csrf_token() }}",--}}
{{--                    'user_id': userId,--}}
{{--                },--}}
{{--                success: function (response) {--}}
{{--                }--}}
{{--            });--}}
{{--        }--}}
{{--    </script>--}}
@endsection
