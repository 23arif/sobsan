@extends('layouts.admin')

@section('content')



     <aside class="content-wrapper sidebarLeft">

         <!-- Page Content -->
         <div class="content container-fluid sidebarRight animated fadeInUp">

             <div class="row">



                 <div class="col-sm-12">
                     @if(Session::has('message'))
                         <div class="alert alert-success">{{ Session::get('message') }}</div>
                     @endif
                     <div class="panel panel-white">
                         <div class="panel-body content-title-container">
                             <div class="right">
                                 <ol class="breadcrumb breadcrumb-theme breadcrumb-sm breadcrumb-blue">
                                     <li><a href="index-2.html">Ana Səhifə</a></li>
                                     <li class="active"><a>Bütün Xəbərlər</a></li>
                                 </ol>
                             </div>
                         </div>
                     </div>
                 </div>

                 <div class="col-sm-12">
                     <div class="panel panel-white">
                         <div class="panel-heading">
                             <h3 class="panel-title">Bütün Xəbərlər -> <a href="/news/create"> Yeni Xəbər Əlave Et</a></h3>
                         </div>
                         <div class="panel-body">

                             <table id="table-1" class="table table-bordered table-striped">
                                 <thead>
                                 <th>Xəbərin Adı</th>
                                 <th>Bölməsi</th>
                                 <th>Yenilənmə Tarixi</th>
                                 <th>Sil və Dəyiş</th>

                                 </thead>
                                 <tbody>

                                 @foreach($adminsearch as $new)

                                     <tr><td><a href="/news/{!! $new->id !!}" style="color:{{ $new->reng }}"> {!! $new->xeber_ad !!}</a>  <span class="blink" style="color:{!! $new->ysreng !!};">{!! $new->yanibsonen !!}</span></td>
                                         <td >@foreach($new->alt as $alt)
                                                 {{ $alt->Altad }}
                                             @endforeach
                                         </td>
                                         <td>{!! $new->updated_at !!}</td>
                                         <td><a href="news/{!!$new->id !!}/del" style="margin-left:30px; color:red;" >Sil</a> <a href="/news/{!! $new->id !!}/edit" style="margin-left:30px; color:green;" >Düzəliş Et</a></td>
                                     </tr>

                                 @endforeach







                                 </tbody>
                             </table>
                             {!! $adminsearch->appends(['search' => Input::get('search')])->render() !!}

                         </div>
                     </div>

                 </div>
             </div>

         </div>
         <!-- End Page Content -->

     </aside>



    @endsection