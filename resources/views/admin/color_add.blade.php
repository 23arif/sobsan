@extends('layouts.admin')

@section('content')
    <aside class="content-wrapper sidebarLeft">

        <!-- Page Content -->
        <div class="content container-fluid sidebarRight animated fadeInUp">

            <div class="row">


                <div class="col-sm-12">

                    <form action="{{asset('/color/store')}}" enctype="multipart/form-data" method="POST">

                        {!! csrf_field() !!}

                        <div class="col-sm-6">
                            <label for="Ad">Rəng adı(Az)</label>
                            <input class="form-control" id="Ad" type="text" name="ad_az" value="">
                            </br>

                            <label for="Ad">Rəng adı(En)</label>
                            <input class="form-control" id="Ad" type="text" name="ad_en" value="">
                            </br>

                            <label for="Ad">Rəng adı(Ru)</label>
                            <input class="form-control" id="Ad" type="text" name="ad_ru" value="">
                            </br>

                            <label for="Ad">Rəng kodu</label>
                            <input class="" id="Ad" type="color" name="color_code" value="">
                            </br>

                            <div class="col-sm-12">
                                </br>

                                <button class="btn btn-success">Əlavə et</button>
                            </div>


                        </div>
                    </form>
                    </br>
                    @if(count($errors) > 0)
                        <div class="alert alert-warning">
                            <ul>
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>


                    @endif


                </div>

            </div>
            <!-- End Page Content -->

        </div>
    </aside>
@endsection
