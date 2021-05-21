@extends('layouts.admin')

@section('content')

    <aside class="content-wrapper sidebarLeft">

        <!-- Page Content -->
        <div class="content container-fluid sidebarRight animated fadeInUp">

            <div class="row">

                <div class="col-sm-12">

                </div>

                <div class="col-sm-12">

                    <a class="btn btn-default" href="/admins/elaqe/create" role="button">Əlavə Et</a>

                    <hr>

                    @foreach($elaqe as $ab)

                        {!! $ab->elaqe !!}
                        <a class="btn btn-default" href="/admins/elaqe/{!! $ab->id !!}/edit" role="button">Dəyiş</a>
                        <a class="btn btn-default" href="/admins/elaqe/{!! $ab->id !!}/del" role="button">Sil</a>
                    @endforeach

                </div>

            </div>

        </div>
        </div>

        <!-- End Page Content -->

    </aside>




@endsection