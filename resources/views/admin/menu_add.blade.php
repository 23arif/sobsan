@extends('layouts.admin')

@section('content')
    <aside class="content-wrapper sidebarLeft">

        <!-- Page Content -->
        <div class="content container-fluid sidebarRight animated fadeInUp">

            <div class="row">


                <div class="col-sm-12">

                    <form action="{{asset('/menu/store')}}" enctype="multipart/form-data" method="POST">

                        {!! csrf_field() !!}

                       <div class="row">
                           <div class="col-sm-6">
                               <label for="Ad">Menu tipi</label>
                               <select class="form-control" name="menu_type">
                                   <option value="0">Seçin</option>
                                   @foreach($cat as $category)
                                       <option value="{{$category->id}}">
                                           {{$category->getMenu->where('lang','az')->first()->name}}
                                       </option>
                                   @endforeach
                               </select>
                               </br>
                               <label for="Ad">Menu adı(Az)</label>
                               <input class="form-control" id="Ad" type="text" name="ad[]" value="">
                               </br>

                               <label for="Ad">Menu adı(En)</label>
                               <input class="form-control" id="Ad" type="text" name="ad[]" value="">
                               </br>

                               <label for="Ad">Menu adı(Ru)</label>
                               <input class="form-control" id="Ad" type="text" name="ad[]" value="">
                               </br>

                               <input type="hidden" value="az" name="lang[]">
                               <input type="hidden" value="en" name="lang[]">
                               <input type="hidden" value="ru" name="lang[]">
                           </div>
                       </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <button class="btn btn-success">Əlavə et</button>
                            </div>
                        </div>


                    </form>
                    </br>
                </div>

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

    </aside>
@endsection
