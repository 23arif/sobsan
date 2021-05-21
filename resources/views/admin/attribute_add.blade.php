@extends('layouts.admin')

@section('content')
    <aside class="content-wrapper sidebarLeft">

        <!-- Page Content -->
        <div class="content container-fluid sidebarRight animated fadeInUp">

            <div class="row">


                <div class="col-sm-12">

                    <form action="{{asset('/attribute_store')}}" enctype="multipart/form-data" method="POST">

                        {!! csrf_field() !!}

                        <div class="row">
                            <div class="col-sm-12">
                                <label for="Ad">Kateqoriya tipi</label>
                                <select class="form-control" name="cat_id" required>
                                    <option selected="true" disabled="disabled" value="">Seçin</option>
                                    @foreach($groups as $group)
                                        <option value="{{$group->id}}">
                                            {{$group->group_n_az}}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="attr-container">
                            <div class="row">
                                <div class="col-sm-4">
                                    <label for="Ad">Atribut adı(Az)</label>
                                    <input class="form-control" id="Ad" type="text" name="ad_az[]" value="" required>
                                </div>
                                <div class="col-sm-4">
                                    <label for="Ad">Atribut adı(En)</label>
                                    <input class="form-control" id="Ad" type="text" name="ad_en[]" value="" required>
                                </div>
                                <div class="col-sm-4">
                                    <label for="Ad">Atribut adı(Ru)</label>
                                    <input class="form-control" id="Ad" type="text" name="ad_ru[]" value="" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12" style="display: flex;justify-content: end">
                                <button class="btn btn-primary float-right" onclick="addAttr()" type="button">+</button>
                                <button class="btn btn-primary" onclick="removeAttr()" type="button">-</button>
                            </div>
                            <button class="btn btn-success">Əlavə et</button>
                        </div>
                    </form>
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
@section('js')
    <script>
        function addAttr() {
            var container = $('.attr-container');
            var attr = '<div class="row">\n' +
                '<hr>\n' +
                '                                <div class="col-sm-4">\n' +
                '                                    <label for="Ad">Atribut adı(Az)</label>\n' +
                '                                    <input class="form-control" id="Ad" type="text" name="ad_az[]" value="">\n' +
                '                                </div>\n' +
                '                                <div class="col-sm-4">\n' +
                '                                    <label for="Ad">Atribut adı(En)</label>\n' +
                '                                    <input class="form-control" id="Ad" type="text" name="ad_en[]" value="">\n' +
                '                                </div>\n' +
                '                                <div class="col-sm-4">\n' +
                '                                    <label for="Ad">Atribut adı(Ru)</label>\n' +
                '                                    <input class="form-control" id="Ad" type="text" name="ad_ru[]" value="">\n' +
                '                                </div>\n' +
                '                            </div>';
            container.append(attr)
        }

        function removeAttr() {
            var container = $('.attr-container');
            var countAttr = container.find('.row').length;
            if (countAttr > 1) {
                container.find('.row').last().remove()
            }
        }
    </script>
@endsection
