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
                                      action="{!! route('updateProduct',['id'=>$product->id]) !!}" method="POST"
                                      enctype="multipart/form-data">
                                    {!! csrf_field() !!}

                                    <div class="form-group">
                                        <ul style="margin-left:15px;border:1px solid black;float:left; width:100%;padding:2%;">
                                            @foreach($categories as $cat)
                                                @foreach($product->getPrCats as $p_cat)
                                                    @if($p_cat->cat_id == $cat->id)
                                                        <input type="hidden" name="cat[]" value="{{$p_cat->id}}">
                                                        <div
                                                            style="opacity:1;width:33.333%;display: flex;float:left;margin-bottom:15px;"
                                                            class="alert alert-warning alert-dismissible fade show"
                                                            role="alert">
                                                            <input type="hidden" value="{{$p_cat->id}}" name="old_cat[]">
                                                            <strong>{{$cat->getCat->where('lang','az')->first()->name}}</strong>
                                                            <button type="button" class="close" data-dismiss="alert"
                                                                    aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                    @endif
                                                @endforeach
                                            @endforeach

                                        </ul>
                                        <label class="col-sm-1 control-label">Kateqoriya</label>
                                        <div class="col-sm-11">
                                            <select class="js-example-basic-single form-control" name="category_id[]" multiple>
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
                                                    <option @if($product->brand == $brend->id) selected="" @endif value="{{$brend->id}}">{{$brend->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <ul style="margin-left:15px;border:1px solid black;float:left; width:100%;padding:2%;">
                                            @if(count($product->getPrColors) == 0)
                                                No selected colors
                                            @endif
                                            @foreach($product->getPrColors as $color)
                                                <input type="hidden" name="old_color_id[]" value="{{$color->color_id}}">
                                                <div
                                                    style="opacity:1;width:33.333%;display: flex;float:left;margin-bottom:15px;"
                                                    class="alert alert-warning alert-dismissible fade show"
                                                    role="alert">
                                                    <input type="hidden" name="color_id[]" value="{{$color->color_id}}">
                                                    <strong>{{$color->getColors->color_n_az}}</strong>
                                                    <button type="button" class="close" data-dismiss="alert"
                                                            aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                            @endforeach
                                        </ul>
                                        <label class="col-sm-1 control-label">Rənglər</label>
                                        <div class="col-sm-11">
                                            <select class="js-example-basic-single form-control" name="colors[]"
                                                    multiple>
                                                @foreach($colors as $color)
                                                    <option
                                                        value="{{$color->id}}">{{$color->color_n_az}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                            <ul style="margin-left:15px;border:1px solid black;float:left; width:100%;padding:2%;">
                                                @if(count($product->getSuitables) == 0)
                                                    No selected colors
                                                @endif
                                                @foreach($product->getSuitables as $suitable)
                                                    <input type="hidden" name="old_suitables_id[]"
                                                           value="{{$suitable->pr}}">
                                                    <div
                                                        style="opacity:1;width:33.333%;display: flex;float:left;margin-bottom:15px;"
                                                        class="alert alert-warning alert-dismissible fade show"
                                                        role="alert">
                                                        <input type="hidden" name="suitables_id[]"
                                                               value="{{$suitable->pr}}">
                                                        <strong>{{$suitable->getSuits->first()->getPr->first()->title}}</strong>
                                                        <button type="button" class="close" data-dismiss="alert"
                                                                aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                @endforeach
                                            </ul>
                                            <label class="col-sm-1 control-label">Məhsullar</label>
                                            <div class="col-sm-11">
                                                <select class="js-example-basic-single form-control" name="suitables[]"
                                                        multiple>
                                                    @foreach($suitables as $suitable)
                                                        <option
                                                            value="{{$suitable->id}}">{{$suitable->getPr->first()->title}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    <div class="form-group">
                                        <ul style="margin-left:15px;border:1px solid black;float:left; width:100%;padding:2%;">
                                            @if(!$product->banner)
                                                No selected colors
                                            @else
                                                <div
                                                    style="opacity:1;width:33.333%;display: flex;float:left;margin-bottom:15px;"
                                                    class="alert alert-warning alert-dismissible fade show"
                                                    role="alert">
                                                    <input type="hidden" name="banner_id"
                                                           value="{{$banners->where('id',$product->banner)->first()->id}}">
                                                    <strong>{{$banners->where('id',$product->banner)->first()->getBanner->first()->title}}</strong>
                                                    <button type="button" class="close" data-dismiss="alert"
                                                            aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                            @endif
                                        </ul>
                                        <label class="col-sm-1 control-label">Bannerlər</label>
                                        <div class="col-sm-11">
                                            <select class="js-example-basic-single form-control" name="banner">
                                                <option value="0">Select</option>
                                                @foreach($banners as $banner)
                                                    <option
                                                        value="{{$banner->id}}">{{$banner->getBanner->first()->title}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                                <label class="col-sm-1 control-label">Məhsul kodu</label>
                                                <div class="col-sm-11">
                                                    <input type="text" name="code" value="{{$product->code}}"
                                                           class="form-control">
                                                </div>
                                            </div>

                                    <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist"
                                        style="margin-bottom: 25px">
                                        @foreach($product->getPr as $k=>$pr)
                                            <li class="nav-item @if($k == 0)  active @endif">
                                                <a class="nav-link active " id="pills-home-tab" data-toggle="pill"
                                                   href="#pills-home{{$k}}" role="tab" aria-controls="pills-home"
                                                   aria-selected="true">{{ucfirst($pr->lang)}}</a>
                                            </li>
                                        @endforeach
                                    </ul>
                                    <div class="tab-content" id="pills-tabContent">
                                        @foreach($product->getPr as $k=>$prod)
                                            <div class="tab-pane @if($k == 0) fade active in @endif"
                                                 id="pills-home{{$k}}" role="tabpanel"
                                                 aria-labelledby="pills-home-tab">
                                                <div class="form-group">
                                                    <label class="col-sm-1 control-label">Başlıq ({{$prod->lang}}
                                                        )</label>
                                                    <div class="col-sm-11">
                                                        <input type="text" name="basliq[]" value="{{$prod->title}}"
                                                               class="form-control">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                <label class="col-sm-1 control-label">Bloq Mətn ({{$prod->lang}})</label>
                                                <div class="col-sm-11">
                                                    <input type="text" name="blog_text[]" value="{{$prod->blog_text}}"
                                                           class="form-control">
                                                </div>
                                            </div>
                                                <div class="form-group">
                                                    <label class="col-sm-1 control-label">Mətn ({{$prod->lang}})</label>
                                                    <div class="col-sm-11 col-sm-offset-1">
                                            <textarea id="ckeditor{{$k}}"
                                                      name="xeber_ardi[]">{!! $prod->description !!}</textarea>
                                                        <script>
                                                            CKEDITOR.replace('ckeditor{{$k}}', {
                                                                filebrowserUploadUrl: '/assets/filebrowser/plugin.js'
                                                            });
                                                        </script>
                                                    </div>
                                                </div>
                                                <input type="hidden" value="{{$prod->lang}}" name="lang[]">
                                            </div>
                                        @endforeach
                                    </div>

                                    <div class="form-group">
                                        <label class="col-sm-1 control-label">Qiymət</label>
                                        <div class="col-sm-11">
                                            <input min="0.0" step="any" type="number" name="price"
                                                   @if($product->discount_amount != 0.00) value="{{$product->discount}}" @else value="{{$product->price}}" @endif"
                                                   class="form-control">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-sm-1 control-label">Endirim</label>
                                        <div class="col-sm-7">
                                            <input min="0.0" step="any" type="number" name="discount"
                                                   value="{{$product->discount_amount}}"
                                                   class="form-control">
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="wrapper">
                                                <input type="radio" name="type" id="option-1" checked value="0"
                                                       @if($product->type == 0) checked @endif>
                                                <input type="radio" name="type" id="option-2" value="1"
                                                       @if($product->type == 1) checked @endif>
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

                                    <img width="200" height="150"
                                         src="{{asset('/public/Products').'/'.$product->blog_img}}" alt="">
                                    <input type="hidden" name="old_blog_img" value="{{$product->blog_img}}">
                                    <div class="form-group">
                                        <label class="col-sm-1 control-label">Blog image</label>
                                        <div class="col-sm-11">
                                            <input type="file" class="form-control" id="removefile" name="blog_img"
                                                   value="">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <ul style="margin-left:15px;border:1px solid black;float:left; width:100%;padding:2%;">
                                            @if(count($product->getPrImgs) == 0)
                                                No image
                                            @endif
                                            @foreach($product->getPrImgs as $image)
                                                <input type="hidden" name="old_img_id[]" value="{{$image->id}}">
                                                <div
                                                    style="opacity:1;width:33.333%;display: flex;float:left;margin-bottom:15px;"
                                                    class="alert alert-warning alert-dismissible fade show"
                                                    role="alert">
                                                    <input type="hidden" name="img_id[]" value="{{$image->id}}">
                                                    <img width="200" height="150"
                                                         src="{{asset('/public/Products').'/'.$image->img}}" alt="">
                                                    <button type="button" class="close" data-dismiss="alert"
                                                            aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                            @endforeach
                                        </ul>
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
                                            <input type="checkbox" name="active"
                                                   @if($product->active == 1) checked @endif> &nbsp;&nbsp;&nbsp;
                                            <label class="control-label">Yeni</label>
                                            <input type="checkbox" name="new" @if($product->new == 1) checked @endif>&nbsp;&nbsp;&nbsp;
                                            <label class="control-label">Ən çox satılanlar</label>
                                            <input type="checkbox" name="best" @if($product->best == 1) checked @endif>&nbsp;&nbsp;&nbsp;
                                            <label class="control-label">Təklif olunan</label>
                                            <input type="checkbox" name="offers"
                                                   @if($product->offer == 1) checked @endif>&nbsp;&nbsp;&nbsp;
                                            <label class="control-label">Ana səhifə</label>
                                            <input type="checkbox" name="home" @if($product->home == 1) checked @endif>&nbsp;&nbsp;&nbsp;
                                        </div>
                                    </div>


                                    <button style="margin-right:15px;margin-top:10px;float:right"
                                            class="btn btn-success">Update
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
        $(document).ready(function () {
            $('.js-example-basic-single').select2();
        });
    </script>
@endsection
