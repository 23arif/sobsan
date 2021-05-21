@extends('layouts.admin')
@section('content')
    <aside class="content-wrapper collapse sidebarLeft">

        <!-- Page Content -->
        <div class="content container-fluid sidebarRight animated fadeInUp mail compose-wrapper">

            @foreach($errors->all() as $error)

                {!! $error !!}}

            @endforeach

            <div class="panel panel-white">
                <div class="panel-body">
                    <div class="row">


                    </div>
                    <div class="row">
                        <div class="col-sm-9 col-md-10">
                            <div class="compose-container">
                                <form class="form-horizontal" role="form"
                                      action="{!! URL::action('ProductController@store') !!}" method="POST"
                                      enctype="multipart/form-data">
                                    {!! csrf_field() !!}

                                    <div class="form-group">
                                        <label class="col-sm-1 control-label">Kateqoriya</label>
                                        <div class="col-sm-11 col-sm-offset-1">
                                            <select class="js-example-basic-single form-control" name="cat[]" multiple
                                                    onchange="getAttrs()" id="catSelect">
                                                @foreach($cats as $cat)
                                                    <option
                                                        value="{{$cat->getCat[0]->cat_id}}">{{$cat->getCat[0]->name}}</option>
                                                    @if(isset($cat->children[0]))
                                                        @foreach($cat->children as $c)
                                                            <option value="{{$c->getCat[0]->cat_id}}">
                                                                -{{$c->getCat[0]->name}}</option>
                                                            @if(isset($c->children[0]))
                                                                @foreach($c->children as $s)
                                                                    <option value="{{$s->getCat[0]->cat_id}}">&nbsp;&nbsp;--{{$s->getCat[0]->name}}</option>
                                                                @endforeach
                                                            @endif
                                                        @endforeach
                                                    @endif
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-sm-1 control-label">Brendlər</label>
                                        <div class="col-sm-11">
                                            <select class="form-control" name="brand">
                                                <option  value="0">Seçin</option>

                                                @foreach($brands as $brend)
                                                    <option  value="{{$brend->id}}">{{$brend->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-sm-1 control-label">Atributlar</label>
                                        <div class="col-sm-11">
                                            <select class="js-example-basic-single form-control" name="attributes[]"
                                                    multiple id="attrSelect">

                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-sm-1 control-label">Rənglər</label>
                                        <div class="col-sm-11">
                                            <select class="js-example-basic-single form-control" name="colors[]"
                                                    multiple>
                                                @foreach($colors as $color)
                                                    <option
                                                        value="{{$color->id}}">{{ucfirst($color->color_n_az)}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-sm-1 control-label">Məhsullar</label>
                                        <div class="col-sm-11">
                                            <select class="js-example-basic-single form-control" name="prs[]" multiple>
                                                @foreach($products as $product)
                                                    <option
                                                        value="{{$product->id}}">{{ucfirst($product->getPr->first()->title)}}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-sm-1 control-label">Növlərə görə əlavə</label>
                                        <div class="col-sm-11">
                                            <select class="js-example-basic-single form-control" name="banner">
                                                <option value="0">Select</option>
                                                @foreach($banners as $banner)
                                                    <option
                                                        value="{{$banner->id}}">{{ucfirst($banner->getBanner->first()->title)}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                                <label class="col-sm-1 control-label">Məhsul kodu</label>
                                                <div class="col-sm-11">
                                                    <input type="text" name="code" value="{!! old('basliq') !!}"
                                                           class="form-control">
                                                </div>
                                            </div>

                                    <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist"
                                        style="margin-bottom: 25px">
                                        <li class="nav-item active">
                                            <a class="nav-link active" id="pills-home-tab" data-toggle="pill"
                                               href="#pills-home" role="tab" aria-controls="pills-home"
                                               aria-selected="true">Az</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" id="pills-profile-tab" data-toggle="pill"
                                               href="#pills-profile" role="tab" aria-controls="pills-profile"
                                               aria-selected="false">En</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" id="pills-contact-tab" data-toggle="pill"
                                               href="#pills-contact" role="tab" aria-controls="pills-contact"
                                               aria-selected="false">Ru</a>
                                        </li>
                                    </ul>
                                    <div class="tab-content" id="pills-tabContent">
                                        <div class="tab-pane fade active in" id="pills-home" role="tabpanel"
                                             aria-labelledby="pills-home-tab">
                                            <div class="form-group">
                                                <label class="col-sm-1 control-label">Başlıq (Az)</label>
                                                <div class="col-sm-11">
                                                    <input type="text" name="basliq[]" value="{!! old('basliq') !!}"
                                                           class="form-control">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-sm-1 control-label">Bloq Mətn (Az)</label>
                                                <div class="col-sm-11">
                                                    <input type="text" name="blog_text[]" value="{!! old('basliq') !!}"
                                                           class="form-control">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-sm-1 control-label">Mətn (Az)</label>
                                                <div class="col-sm-11 col-sm-offset-1">
                                            <textarea id="ckeditor2"
                                                      name="xeber_ardi[]">{!! old('xeber_ardi') !!}</textarea>
                                                    <script>
                                                        CKEDITOR.replace('ckeditor2', {
                                                            filebrowserUploadUrl: '/assets/filebrowser/plugin.js'
                                                        });
                                                    </script>
                                                </div>
                                            </div>
                                            <input type="hidden" value="az" name="lang[]">
                                        </div>
                                        <div class="tab-pane fade" id="pills-profile" role="tabpanel"
                                             aria-labelledby="pills-profile-tab">
                                            <div class="form-group">
                                                <label class="col-sm-1 control-label">Başlıq (En)</label>
                                                <div class="col-sm-11">
                                                    <input type="text" name="basliq[]" value="{!! old('basliq') !!}"
                                                           class="form-control">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-sm-1 control-label">Bloq Mətn (En)</label>
                                                <div class="col-sm-11">
                                                    <input type="text" name="blog_text[]" value="{!! old('basliq') !!}"
                                                           class="form-control">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-sm-1 control-label">Mətn (En)</label>
                                                <div class="col-sm-11 col-sm-offset-1">
                                            <textarea id="ckeditor4"
                                                      name="xeber_ardi[]">{!! old('xeber_ardi') !!}</textarea>
                                                    <script>
                                                        CKEDITOR.replace('ckeditor4', {
                                                            filebrowserUploadUrl: '/assets/filebrowser/plugin.js'
                                                        });
                                                    </script>
                                                </div>
                                            </div>
                                            <input type="hidden" value="en" name="lang[]">
                                        </div>
                                        <div class="tab-pane fade" id="pills-contact" role="tabpanel"
                                             aria-labelledby="pills-contact-tab">
                                            <div class="form-group">
                                                <label class="col-sm-1 control-label">Başlıq (RU)</label>
                                                <div class="col-sm-11">
                                                    <input type="text" name="basliq[]" value="{!! old('basliq') !!}"
                                                           class="form-control">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-sm-1 control-label">Bloq Mətn (Ru)</label>
                                                <div class="col-sm-11">
                                                    <input type="text" name="blog_text[]" value="{!! old('basliq') !!}"
                                                           class="form-control">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-sm-1 control-label">Mətn (RU)</label>
                                                <div class="col-sm-11 col-sm-offset-1">
                                            <textarea id="ckeditor6"
                                                      name="xeber_ardi[]">{!! old('xeber_ardi') !!}</textarea>
                                                    <script>
                                                        CKEDITOR.replace('ckeditor6', {
                                                            filebrowserUploadUrl: '/assets/filebrowser/plugin.js'
                                                        });
                                                    </script>
                                                </div>
                                            </div>
                                            <input type="hidden" value="ru" name="lang[]">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-sm-1 control-label">Qiymət</label>
                                        <div class="col-sm-11">
                                            <input min="0.0" step="any" type="number" name="price" value=""
                                                   class="form-control">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-sm-1 control-label">Endirim</label>
                                        <div class="col-sm-7">
                                            <input min="0.0" step="any" type="number" name="discount" value=""
                                                   class="form-control">
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="wrapper">
                                                <input type="radio" name="type" id="option-1" checked value="0">
                                                <input type="radio" name="type" id="option-2" value="1">
                                                <label for="option-1" class="option option-1">
                                                    <div class="dot"></div>
                                                    <span>AZN</span>
                                                </label>
                                                <label for="option-2" class="option option-2">
                                                    <div class="dot"></div>
                                                    <span>%</span>
                                                </label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-sm-1 control-label">Stock</label>
                                        <div class="col-sm-11">
                                            <input min="0.0" step="any" type="number" name="stock" value=""
                                                   class="form-control">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-sm-1 control-label" for="blog_img">Blog image</label>
                                        <div class="col-sm-11">
                                            <input type="file" class="form-control" id="blog_img" name="blog_img"
                                                   value="" required>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-sm-1 control-label">Images</label>
                                        <div class="col-sm-11">
                                            <input type="file" class="form-control" id="img" name="img[]" value=""
                                                   multiple>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-sm-1 control-label"></label>
                                        <div class="col-sm-11">
                                            <label class="control-label">Aktiv</label>
                                            <input type="checkbox" name="active"> &nbsp;&nbsp;&nbsp;
                                            <label class="control-label">Yeni</label>
                                            <input type="checkbox" name="new">&nbsp;&nbsp;&nbsp;
                                            <label class="control-label">Popular məhsullar</label>
                                            <input type="checkbox" name="best">&nbsp;&nbsp;&nbsp;
                                            <label class="control-label">Tövsiyə edilir</label>
                                            <input type="checkbox" name="offers">&nbsp;&nbsp;&nbsp;
{{--                                            <label class="control-label">Ana səhifə</label>--}}
{{--                                            <input type="checkbox" name="home" f>&nbsp;&nbsp;&nbsp;--}}
                                        </div>
                                    </div>


                                    <button style="margin-right:15px;margin-top:10px;float:right"
                                            class="btn btn-success">Add
                                    </button>

                                </form>

                            </div>

                        </div>
                    </div>
                </div>

            </div>
        </div>


        </div>
        <!-- End Page Content -->
    </aside>
    <style>
        .wrapper {
            display: inline-flex;
            align-items: center;
            justify-content: flex-end;
            width: 100%;
        }

        .wrapper .option {
            width: auto;
            height: 42px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            border-radius: 5px;
            cursor: pointer;
            padding: 5px 21px;
            border: 2px solid lightgrey;
            transition: all 0.3s ease;
            margin-right: 1em;
        }

        .wrapper .option .dot {
            height: 20px;
            width: 20px;
            background: #d9d9d9;
            border-radius: 50%;
            position: relative;

        }

        .wrapper .option .dot::before {
            position: absolute;
            content: "";
            top: 4px;
            left: 4px;
            width: 12px;
            height: 12px;
            background: #0069d9;
            border-radius: 50%;
            opacity: 0;
            transform: scale(1.5);
            transition: all 0.3s ease;
        }

        .wrapper input[type="radio"] {
            display: none;
        }

        .wrapper #option-1:checked:checked ~ .option-1,
        .wrapper #option-2:checked:checked ~ .option-2 {
            border-color: #0069d9;
            background: #0069d9;
        }

        .wrapper #option-1:checked:checked ~ .option-1 .dot,
        .wrapper #option-2:checked:checked ~ .option-2 .dot {
            background: #fff;
        }

        .wrapper #option-1:checked:checked ~ .option-1 .dot::before,
        .wrapper #option-2:checked:checked ~ .option-2 .dot::before {
            opacity: 1;
            transform: scale(1);
        }

        .wrapper .option span {
            font-size: 14px;
            color: #808080;
            margin-left: 5px;
        }

        .wrapper #option-1:checked:checked ~ .option-1 span,
        .wrapper #option-2:checked:checked ~ .option-2 span {
            color: #fff;
        }
    </style>
@endsection
@section('js')
    <script>
        $(window).ready(function () {
            $('.js-example-basic-single').select2();
        });

        function getAttrs() {
            $.ajax({
                url: "{{route('prAdd')}}",
                type: 'get',
                data: {
                    '_token': "{{ csrf_token() }}",
                    'cat_id': $('#catSelect').val(),
                },
                success: function (response) {
                    $('#attrSelect').html(response);
                }
            })
        }
    </script>
@endsection
