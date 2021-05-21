@extends('layouts.admin')

@section('content')
    <aside class="content-wrapper sidebarLeft">

        <!-- Page Content -->
        <div class="content container-fluid sidebarRight animated fadeInUp">

            <div class="row">

                <div class="col-sm-12">

                </div>

                <div class="col-sm-12">

                    <form action="{{asset('/attribute_update/'.$id)}}" enctype="multipart/form-data"
                          method="POST">
                        {!! csrf_field() !!}
                        <label for="Ad">Kateqoriya tipi</label>
                        <select class="form-control" name="cat_id" required>
                            @foreach($cat as $category)
                                <option value="{{$category->id}}"
                                        @if($category->id == $id) selected @endif>
                                    {{$category->group_n_az}}
                                </option>
                            @endforeach
                        </select>

                        <div class="attr-container">
                            @foreach($attributes as $attribute)
                                <input type="hidden" name="old_attr_az[]" value="{{$attribute->id}}">
                                <div class="row">
                                    <hr>
                                    <input type="hidden" name="current_attr_az[]" value="{{$attribute->id}}">
                                    <div class="col-sm-12" style="display: flex;justify-content: end">
                                        <button class="btn btn-primary" onclick="removeAttr(this)" type="button">-</button>
                                    </div>
                                    <div class="col-sm-4">
                                        <label for="Ad">Atribut adı(Az)</label>
                                        <input class="form-control" id="Ad" type="text" name="ad_az[]"
                                               value="{{$attribute->attribute_n_az}}" required>
                                    </div>
                                    <div class="col-sm-4">
                                        <label for="Ad">Atribut adı(En)</label>
                                        <input class="form-control" id="Ad" type="text" name="ad_en[]"
                                               value="{{$attribute->attribute_n_en}}" required>
                                    </div>
                                    <div class="col-sm-4">
                                        <label for="Ad">Atribut adı(Ru)</label>
                                        <input class="form-control" id="Ad" type="text" name="ad_ru[]"
                                               value="{{$attribute->attribute_n_ru}}" required>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <div class="row">
                            <div class="col-sm-12" style="display: flex;justify-content: end;margin: 2em 0">
                                <button class="btn btn-primary float-right" onclick="addAttr()" type="button">+</button>
                                <button class="btn btn-success">Edit</button>
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

        </div>
        <!-- End Page Content -->

    </aside>
@endsection
@section('js')
    <script>
        function addAttr() {
            var container = $('.attr-container');
            var attr = '<div class="row">\n' +
                '<hr>\n' +
                '<div class="col-sm-12" style="display: flex;justify-content: end">\n' +
                '<button class="btn btn-primary" onclick="removeAttr(this)" type="button">-</button>\n' +
                '</div>\n'+
                '<div class="col-sm-4">\n' +
                '<label for="Ad">Atribut adı(Az)</label>\n' +
                '<input class="form-control" id="Ad" type="text" name="new_ad_az[]" value="">\n' +
                '</div>\n' +
                '<div class="col-sm-4">\n' +
                '<label for="Ad">Atribut adı(En)</label>\n' +
                '<input class="form-control" id="Ad" type="text" name="new_ad_en[]" value="">\n' +
                '</div>\n' +
                '<div class="col-sm-4">\n' +
                '<label for="Ad">Atribut adı(Ru)</label>\n' +
                '<input class="form-control" id="Ad" type="text" name="new_ad_ru[]" value="">\n' +
                '</div>\n' +
                '</div>';
            container.append(attr)
        }

        function removeAttr(t) {
            // var container = $('.attr-container');
            // var countAttr = container.find('.row').length;
            // if (countAttr > 1) {
            //     container.find('.row').last().remove()
            // }
            $(t).closest('.row').remove()
        }
    </script>
@endsection
