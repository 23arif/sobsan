@extends('layouts.admin') @section('content')

    <aside class="content-wrapper collapse sidebarLeft">

        <!-- Page Content -->
        <div class="content container-fluid sidebarRight animated fadeInUp mail compose-wrapper">

            @foreach($errors->all() as $error) {!! $error !!}} @endforeach

            <div class="panel panel-white">
                <div class="panel-body">

                    <div class="row">

                    </div>

                    <div class="row">

                        <div class="col-sm-9 col-md-10">

                            <div class="compose-container">

                                <form class="form-horizontal" role="form"
                                      action="{!! URL::action('PromocodeController@update',$promo->id) !!}" method="POST"
                                      enctype="multipart/form-data">

                                    {!! csrf_field() !!}
                                    <div class="form-group">
                                        <label class="col-sm-1 control-label">Kateqoriya</label>
                                        <div class="col-sm-11 col-sm-offset-1">
                                            <select name="cat" id="promocat" class="form-control">
                                                @foreach($categories as $category)
                                                    <option value="{{$category->id}}" @if($category->id == $promo->cat) selected @endif>{{$category->getCat->first()->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-sm-1 control-label">Başlama tarixi</label>
                                        <div class="col-sm-11">
                                            <input type="date" name="start" value="{{$promo->start}}"
                                                   class="form-control">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-sm-1 control-label">Bitmə tarixi</label>
                                        <div class="col-sm-11">
                                            <input type="date" name="end" value="{{$promo->end}}"
                                                   class="form-control">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-sm-1 control-label">Məbləğ</label>
                                        <div class="col-sm-11">
                                            <input type="number" name="amount" value="{{$promo->amount}}"
                                                   class="form-control">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-sm-1 control-label">Növ</label>
                                        <div class="col-sm-11" style="display: flex">
                                            <div class="wrapper">
                                                <input type="radio" name="type" id="option-1" checked value="0" @if($promo->type == 0) checked @endif>
                                                <input type="radio" name="type" id="option-2" value="1" @if($promo->type == 1) checked @endif>
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

                                    <button style="float:right;margin-top:20px" class="btn btn-success">Edit</button>
                                </form>

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
            justify-content: space-evenly;
            padding: 20px 15px;
        }

        .wrapper .option {
            width: auto;
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

        input[type="radio"] {
            display: none;
        }

        #option-1:checked:checked ~ .option-1,
        #option-2:checked:checked ~ .option-2 {
            border-color: #0069d9;
            background: #0069d9;
        }

        #option-1:checked:checked ~ .option-1 .dot,
        #option-2:checked:checked ~ .option-2 .dot {
            background: #fff;
        }

        #option-1:checked:checked ~ .option-1 .dot::before,
        #option-2:checked:checked ~ .option-2 .dot::before {
            opacity: 1;
            transform: scale(1);
        }

        .wrapper .option span {
            font-size: 14px;
            color: #808080;
            margin-left: 5px;
        }

        #option-1:checked:checked ~ .option-1 span,
        #option-2:checked:checked ~ .option-2 span {
            color: #fff;
        }
    </style>
@endsection
