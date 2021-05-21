@extends('layouts.admin')
@section('content')
    <aside class="content-wrapper collapse sidebarLeft">

        <!-- Page Content -->
        <div class="content container-fluid sidebarRight animated fadeInUp mail compose-wrapper">

            @if(Session::has('message'))
                <div class="alert alert-success">{{ Session::get('message') }}</div>
            @endif

            <div class="panel panel-white">
                <div class="panel-body">
                    <div class="row">
                    </div>
                    <div class="row">
                        <div class="col-sm-9 col-md-10">
                            <div class="compose-container">
                                <form class="form-horizontal" role="form"
                                      action="{!! route('discountCardUpdate',['id'=>1]) !!}" method="POST"
                                      enctype="multipart/form-data">
                                    {!! csrf_field() !!}
                                    <input type="hidden" name="old_img" value="{{$discountCard->img}}">
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist"
                                                style="margin-bottom: 25px">
                                                @foreach($discountCard->getCard as $k=>$cardLang)
                                                    <li class="nav-item @if ($k== 0) active @endif">
                                                        <a class="nav-link active" id="pills-home-tab"
                                                           data-toggle="pill"
                                                           href="#pills-home{{$k}}" role="tab"
                                                           aria-controls="pills-home"
                                                           aria-selected="true">{{strtoupper($cardLang->lang)}}</a>
                                                    </li>
                                                @endforeach
                                            </ul>
                                        </div>
                                        <div class="col-sm-6" style="display: flex;justify-content: flex-end">
                                            <label class="switch">
                                                <input type="checkbox" @if($discountCard->switch == 1) checked
                                                       @endif onchange="activeUser(this,'{{$discountCard->id}}')">
                                                <span class="slider round"></span>
                                            </label>
                                        </div>
                                    </div>

                                    <div class="tab-content" id="pills-tabContent">
                                        @foreach($discountCard->getCard as $k=>$cardTranslate)
                                            <div class="tab-pane @if($k==0)fade active in @endif" id="pills-home{{$k}}"
                                                 role="tabpanel"
                                                 aria-labelledby="pills-home-tab">
                                                <div class="form-group">
                                                    <label class="col-sm-1 control-label">Başlıq
                                                        ({{strtoupper($cardTranslate->lang)}})</label>
                                                    <div class="col-sm-11">
                                                        <input type="text" name="basliq[]"
                                                               value="{{$cardTranslate->title}}"
                                                               class="form-control">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-sm-1 control-label">Mətn
                                                        ({{strtoupper($cardTranslate->lang)}})</label>
                                                    <div class="col-sm-11 col-sm-offset-1">
                                                    <textarea id="ckeditor{{$k}}2"
                                                              name="ardi[]">{!! $cardTranslate->text !!}</textarea>
                                                        <script>
                                                            CKEDITOR.replace('ckeditor{{$k}}2', {
                                                                filebrowserUploadUrl: '/assets/filebrowser/plugin.js'
                                                            });
                                                        </script>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-sm-1 control-label">Sifariş linki
                                                        ({{strtoupper($cardTranslate->lang)}})</label>
                                                    <div class="col-sm-11">
                                                        <input type="text" id="orderlink" name="order_link[]"
                                                               value="{{$cardTranslate->order_link}}"
                                                               class="form-control">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-sm-1 control-label">Ətraflı linki
                                                        ({{strtoupper($cardTranslate->lang)}})</label>
                                                    <div class="col-sm-11">
                                                        <input type="text" id="morelink" name="more_link[]"
                                                               value="{{$cardTranslate->more_link}}"
                                                               class="form-control">
                                                    </div>
                                                </div>
                                                <input type="hidden" value="{{$cardTranslate->lang}}" name="lang[]">
                                            </div>
                                        @endforeach
                                    </div>

                                    <div class="form-group">
                                        <label class="col-sm-1 control-label">Image</label>
                                        <div class="col-sm-11">
                                            <img src="{{asset('/public/Banner/'.$discountCard->img)}}" width="150"
                                                 height="100">
                                            <input type="file" id="removefile" name="img" value="" class="form-control">
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
@endsection
@section('js')
    <script>
        function activeUser(t, cardId) {
            $.ajax({
                url: "{{route('activeCard')}}",
                type: 'POST',
                data: {
                    '_token': "{{ csrf_token() }}",
                    'user_id': cardId,
                }
            });
        }
    </script>
@endsection
