@extends('layouts.admin')

@section('content')
    <aside class="content-wrapper sidebarLeft">

        <!-- Page Content -->
        <div class="content container-fluid sidebarRight animated fadeInUp">

            <div class="row">

                <div class="col-sm-12">

                </div>

                <div class="col-sm-5">

                    <form action="{{asset('bolme/'.$cat->id)}}" enctype="multipart/form-data" method="POST">
                        {!! csrf_field() !!}
{{--                        <input type="hidden" name="old_img" value="{{$cat->img}}">--}}

{{--                        <label for="Ad">Kateqoriya şəkli</label>--}}
{{--                        <input class="form-control" id="catImg" type="file" name="catImg" value="">--}}
{{--                        </br>--}}

                        <select class="form-control" name="parent">
                            <option value="0">Seçin</option>
                            @foreach($allCat as $category)
                                <option @if($category->id == $cat->parent) selected @endif value="{{$category->id}}" name="cat">
                                    {{ucfirst($category->getCat[0]->name)}}
                                </option>
                            @endforeach
                        </select>

                        @foreach($cat->getCat as $c)
                            <div class="form-group">
                                <label for="bolme_ad">Kateqoriya adı({{strtoupper($c->lang)}})</label>
                                <input class="form-control" name="ad[]" id="bolme_ad" type="text"
                                       value="{{ $c->name }}">
                            </div>
                            <input type="hidden" value="{{$c->lang}}" name="lang[]">
                        @endforeach

                        <div class="form-group has-feedback">
                            <label class="control-label" for="discount">Endirim</label>
                            <input type="number" class="form-control" id="discount" name="discount" value="{{$cat->discount}}">
                            <span class="fa fa-percent form-control-feedback"></span>
                        </div>

{{--                         <div class="form-group">--}}
{{--                                           <label class="control-label">Ana səhifə</label>--}}
{{--                                            <input type="checkbox" name="home" @if($cat->home == 1) checked @endif>&nbsp;&nbsp;&nbsp;--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
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
    <style>
        .form-control-feedback {
            top: 50%;
        }
    </style>
@endsection
