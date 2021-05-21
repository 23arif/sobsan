@extends('layouts.admin')

@section('content')
    <aside class="content-wrapper sidebarLeft">

        <!-- Page Content -->
        <div class="content container-fluid sidebarRight animated fadeInUp">

            <div class="row">

                <div class="col-sm-12">

                </div>

                <div class="col-sm-12">

                    <form action="{{asset('/animationwordsadd/'.$woredit->id)}}" method="POST">

                        {!! csrf_field() !!}

                        <div class="form-group">
                            <label for="yanson" style="color:grey;">Adress</label>

                            <input class="form-control" name="adress" id="yanson" type="text" value="{{ $woredit->adress }}">
                        </div>

                        <div class="form-group">
                            <label for="yanson" style="color:grey;">Email</label>

                            <input class="form-control" name="email" id="yanson" type="text" value="{{ $woredit->email }}">
                        </div>

                        <div class="form-group">
                            <label for="yanson" style="color:grey;">Phone</label>

                            <input class="form-control" name="nomre" id="yanson" type="text" value="{{ $woredit->nomre }}">
                        </div>

                        <div class="form-group">
                            <label for="yanson" style="color:grey;">Fax</label>

                            <input class="form-control" name="fax" id="yanson" type="text" value="{{ $woredit->fax }}">
                        </div>


                        <div class="form-group">
                            <label for="yanson" style="color:grey;">Facebook</label>

                            <input class="form-control" name="facebook" id="yanson" type="text" value="{{ $woredit->facebook }}">
                        </div>

                        <div class="form-group">
                            <label for="instagram" style="color:grey;">Instagram</label>
                            <input class="form-control" name="instagram" id="instagram" type="text" value="{{ $woredit->instagram }}">
                        </div>

                        <div class="form-group">
                            <label for="yanson" style="color:grey;">Youtube</label>

                            <input class="form-control" name="youtube" id="yanson" type="text" value="{{ $woredit->youtube }}">
                        </div>

                        <button class="btn btn-success">Dəyiş</button>




                    </form></br>
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
