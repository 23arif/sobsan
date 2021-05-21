@extends('layouts.admin')

@section('content')

    <aside class="content-wrapper sidebarLeft">

        <!-- Page Content -->
        <div class="content container-fluid sidebarRight animated fadeInUp">

            <div class="row">

                <div class="col-sm-12">

                </div>

                <div class="col-sm-12">

                    <a class="btn btn-default" href="/admins/reklam/create" role="button">Əlavə Et</a>

                    <hr>

                    @foreach($reklam as $ab)

                        {{ $ab->reklam }}
                        <a class="btn btn-default" href="/admins/reklam/{!! $ab->id !!}/edit" role="button">Dəyiş</a>
                        <a class="btn btn-default" href="/admins/reklam/{!! $ab->id !!}/del" role="button">Sil</a>
                    @endforeach

                </div>

            </div>

        </div>
        </div>

        <!-- End Page Content -->

    </aside>




@endsection
