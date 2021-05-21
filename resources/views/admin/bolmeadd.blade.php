@extends('layouts.admin')

@section('content')
    <aside class="content-wrapper sidebarLeft">

        <!-- Page Content -->
        <div class="content container-fluid sidebarRight animated fadeInUp">

            <div class="row">


                <div class="col-sm-12">

                    <form action="{{asset('/bolme/store')}}" enctype="multipart/form-data" method="POST">

                        {!! csrf_field() !!}

                        <div class="col-sm-6">
                            {{--                            <label for="Ad">Kateqoriya şəkli</label>--}}
                            {{--                            <input class="form-control" id="catImg" type="file" name="catImg" value="">--}}
                            {{--                            </br>--}}

                            <label for="Ad">Kateqoriya tipi</label>
                            <select class="form-control" name="parent">
                                <option value="0">Seçin</option>
                                @foreach($cat as $category)
                                    <option value="{{$category->id}}">
                                        {{$category->getCat->where('lang','az')->first()->name}}
                                    </option>
                                @endforeach
                            </select>
                            </br>


                            <label for="Ad">Kateqoriya adı(Az)</label>
                            <input class="form-control" id="Ad" type="text" name="ad[]" value="">
                            </br>

                            <label for="Ad">Kateqoriya adı(En)</label>
                            <input class="form-control" id="Ad" type="text" name="ad[]" value="">
                            </br>

                            <label for="Ad">Kateqoriya adı(Ru)</label>
                            <input class="form-control" id="Ad" type="text" name="ad[]" value="">
                            </br>

                            <input type="hidden" value="az" name="lang[]">
                            <input type="hidden" value="en" name="lang[]">
                            <input type="hidden" value="ru" name="lang[]">

                            <div class="form-group has-feedback">
                                <label class="control-label" for="discount">Endirim</label>
                                <input type="number" class="form-control" id="discount" name="discount">
                                <span class="fa fa-percent form-control-feedback"></span>
                            </div>



                            {{--                            <div class="form-group">--}}
                            {{--                                <label class="control-label">Ana səhifə</label>--}}
                            {{--                                <input type="checkbox" name="home" f>&nbsp;&nbsp;&nbsp;--}}
                            {{--                            </div>--}}
                        </div>
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
    <style>
        .form-control-feedback {
            top: 50%;
        }
    </style>
@endsection
