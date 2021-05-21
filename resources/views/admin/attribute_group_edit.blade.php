@extends('layouts.admin')

@section('content')
    <aside class="content-wrapper sidebarLeft">

        <!-- Page Content -->
        <div class="content container-fluid sidebarRight animated fadeInUp">

            <div class="row">

                <div class="col-sm-12">

                </div>

                <div class="col-sm-12">

                    <form action="{{asset('/attribute_group_update/'.$group->id)}}" enctype="multipart/form-data" method="POST">
                        {!! csrf_field() !!}
                        <label for="Ad">Kateqoriya tipi</label>
                        <select class="form-control" name="cat_id" required>
                            @foreach($cat as $category)
                                <option value="{{$category->id}}" @if($category->id == $group->cat_id) selected @endif>
                                    {{$category->getCat->where('lang','az')->first()->name}}
                                </option>
                            @endforeach
                        </select>
                        </br>

                        <label for="Ad">Atribut grupu adı(Az)</label>
                        <input class="form-control" id="Ad" type="text" name="ad_az" value="{{$group->group_n_az}}">
                        </br>

                        <label for="Ad">Atribut grupu adı(En)</label>
                        <input class="form-control" id="Ad" type="text" name="ad_en" value="{{$group->group_n_en}}">
                        </br>

                        <label for="Ad">Atribut grupu adı(Ru)</label>
                        <input class="form-control" id="Ad" type="text" name="ad_ru" value="{{$group->group_n_ru}}">
                        </br>

                        <button class="btn btn-success">Edit</button>


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

        </div>
        <!-- End Page Content -->

    </aside>
@endsection
