@extends('layouts.admin')

@section('content')
    <aside class="content-wrapper sidebarLeft">

        <!-- Page Content -->
        <div class="content container-fluid sidebarRight animated fadeInUp">

            <div class="row">

                <div class="col-sm-12">

                </div>

                <div class="col-sm-12">

                    <form action="{{asset('/menu/'.$menu->id)}}" enctype="multipart/form-data" method="POST">
                        {!! csrf_field() !!}

                        <div class="form-group">

                            <label for="Ad">Menu tipi</label>
                            <select class="form-control" name="menu_type">
                                <option>Seçin</option>
                                @foreach($menues as $m)
                                    <option value="{{$m->id}}" @if( $m->id== $menu->id) selected="selected" @endif>{{$m->getMenu->first()->name}}
                                    </option>
                                @endforeach
                            </select>
                            </br>


                        </div>

                        @foreach($menu->getMenu as $l)
                            <div class="form-group">
                                <label for="bolme_ad">Kateqoriya adı({{strtoupper($l->lang)}})</label>
                                <input class="form-control" name="ad[]" id="bolme_ad" type="text"
                                       value="{{ $l->name }}">
                            </div>
                            <input type="hidden" value="{{$l->lang}}" name="lang[]">
                        @endforeach


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
