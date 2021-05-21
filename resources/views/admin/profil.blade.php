@extends('layouts.admin')

@section('content')

    <aside class="content-wrapper sidebarLeft">

        <!-- Page Content -->

        <div class="content container-fluid sidebarRight animated fadeInUp">

            <div class="row">


                <div class="col-sm-8 col-sm-offset-2">

                    <div class="panel panel-white profile-widget">
                        <div class="row">

                            <div class="col-sm-12">
                                <div class="details">
                                    <h4>{!! $user->name !!} <i class="fa fa-sheild"></i></h4>
                                    <div></div>

                                </div>
                            </div>

                        </div>
                    </div>

                    <div class="row">

                        <div class="col-sm-6">

                            <div class="panel panel-white border-top-purple">
                                <div class="panel-heading">
                                    <h3 class="panel-title">Haqqımda</h3>
                                    <div class="controls pull-right">
                                            <span class="pull-right clickable">
                                                <i class="fa fa-chevron-up"></i>
                                            </span>
                                    </div>
                                </div>
                                <div class="panel-body">
                                    <div class="body-section">

                                        <p class="section-content">{!! $user->about !!}</p>
                                    </div>


                                </div>
                            </div>

                        </div>

                        <div class="col-sm-6">

                            <div class="panel panel-white border-top-green">
                                <div class="panel-heading">
                                    <h3 class="panel-title">Profil</h3>
                                    <div class="controls pull-right">
                                            <span class="pull-right clickable">
                                                <i class="fa fa-chevron-up"></i>
                                            </span>
                                    </div>
                                </div>
                                <div class="panel-body">
                                    <div class="body-section">
                                        <h5 class="section-heading">Ad</h5>
                                        <p class="section-content">{!! $user->name !!}</p>
                                    </div>
                                    <div class="body-section">
                                        <h5 class="section-heading">Ünvan</h5>
                                        <p class="section-content">{!! $user->address !!}</p>
                                    </div>
                                    <div class="body-section">
                                        <h5 class="section-heading">Mobil</h5>
                                        <p class="section-content">{!! $user->telefon !!}</p>
                                    </div>
                                    <div class="body-section">
                                        <h5 class="section-heading">Email</h5>
                                        <p class="section-content">{!! $user->email !!}</p>
                                    </div>

                                </div>
                            </div>


                        </div>

                    </div>

                </div>

            </div>

        </div>
        <!-- End Page Content -->

    </aside>
    <!-- End Page Content Wrapper -->
    <div class="modal fade in" id="exampleModal"  role="dialog" aria-labelledby="exampleModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header modal-header-light-orange">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="exampleModalLabel">Profil Dəyiş</h4>
                </div>
                <div class="modal-body">
                    @if($errors->all())
                        <ul class="list-group">
                        @foreach($errors->all() as $error)
                            <li class="list-group-item-warning">{{ $error }}</li>
                        @endforeach
                        </ul>
                    @endif
                    <form action="/profil/edit" method="POST">
                        {!! csrf_field() !!}
                        <input type="hidden" name="_method" value="PUT">
                        <div class="form-group">
                            <label for="recipient-name" class="control-label">Ad</label>
                            <input type="text" name="ad" value="{!! $user->name !!}" class="form-control" id="recipient-name">
                        </div>
                        <div class="form-group">
                            <label for="recipient-name" class="control-label">Köhnə parol</label>
                            <input type="text" name="oldpass" class="form-control" id="recipient-name">
                        </div>
                        <div class="form-group">
                            <label for="recipient-name" class="control-label">Yeni parol</label>
                            <input type="text" name="newpass" class="form-control" id="recipient-name">
                        </div>
                        <div class="form-group">
                            <label for="recipient-name" class="control-label">Yeni parolun təkrarı</label>
                            <input type="text" name="newpass_confirmation" class="form-control" id="recipient-name">
                        </div>
                        <div class="form-group">
                            <label for="recipient-name" class="control-label">Email</label>
                            <input type="text" name="email" value="{!! $user->email !!}" class="form-control" id="recipient-name">
                        </div>
                        <div class="form-group">
                            <label for="recipient-name" class="control-label">Ünvan</label>
                            <input type="text"  name="unvan" value="{!! $user->address !!}" class="form-control" id="recipient-name">
                        </div>
                        <div class="form-group">
                            <label for="recipient-name" class="control-label">Mobil</label>
                            <input type="text"  name="mobil" value="{!! $user->telefon !!}" class="form-control" id="recipient-name">
                        </div>
                        <div class="form-group">
                            <label for="message-text" class="control-label">Haqqımda</label>
                            <textarea class="form-control" name="about"  id="message-text">{!! $user->about !!}</textarea>
                        </div>
                        <input type="submit" class="btn btn-primary" value="Dəyiş">
                    </form>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Bağla</button>

                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="exampleModal1"  role="dialog" aria-labelledby="exampleModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="exampleModalLabel">Örtük Şəkli</h4>
                </div>
                <div class="modal-body">
                    @if($errors->has('imageP'))
                        {!! $errors->first('imageP') !!}
                    @endif

                    <form action="/profil/upload" method="POST" enctype="multipart/form-data">
                        {!! csrf_field() !!}
                        <input type="hidden" name="_method" value="PUT">
                        <div class="form-group">
                            <input type="file" name="pic">
                        </div>
                        <input type="submit" class="btn btn-primary" value="Dəyiş">
                        <a href="/profil/cover/del" class="btn btn-danger">Sil</a>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Bağla</button>

                </div>
            </div>
        </div>
    </div>



    <div class="modal fade" id="exampleModal2"  role="dialog" aria-labelledby="exampleModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="exampleModalLabel">Profil Şəkli</h4>
                </div>
                <div class="modal-body">
                    @if($errors->has('cover'))
                        {!! $errors->first('cover') !!}
                    @endif
                    <form action="/profil/profilpicture" method="POST" enctype="multipart/form-data">
                        {!! csrf_field() !!}
                        <input type="hidden" name="_method" value="PUT">
                        <div class="form-group">
                            <input type="file" name="cover">
                        </div>
                        <input type="submit" class="btn btn-primary" value="Dəyiş">
                        <a href="/profil/image/del" class="btn btn-danger">Sil</a>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Bağla</button>

                </div>
            </div>
        </div>
    </div>


@endsection
