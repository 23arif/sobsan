@extends('layouts.admin')

@section('content')
    <aside class="content-wrapper sidebarLeft">

        <!-- Page Content -->
        <div class="content container-fluid sidebarRight animated fadeInUp">

            <div class="row">


                <div class="col-sm-12">

                    <form action="{{asset('/attribute_group_store')}}" enctype="multipart/form-data" method="POST">

                        {!! csrf_field() !!}

                        <div class="col-sm-6">
                            <label for="Ad">Kateqoriya tipi</label>
                            <select class="form-control" name="cat_id" required>
                                <option selected="true" disabled="disabled" value="">Seçin</option>
                                @foreach($cat as $category)
                                    <option value="{{$category->id}}">
                                        {{$category->getCat->where('lang','az')->first()->name}}
                                    </option>
                                @endforeach
                            </select>
                            </br>


                            <label for="Ad">Atribut grupu adı(Az)</label>
                            <input class="form-control" id="Ad" type="text" name="ad_az" value="">
                            </br>

                            <label for="Ad">Atribut grupu adı(En)</label>
                            <input class="form-control" id="Ad" type="text" name="ad_en" value="">
                            </br>

                            <label for="Ad">Atribut grupu adı(Ru)</label>
                            <input class="form-control" id="Ad" type="text" name="ad_ru" value="">
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
