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

                            </ol>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-sm-12">
                <div class="panel panel-white">
                    <div class="panel-heading">
                        <h3 class="panel-title">Blog Paylaşımları-> <a href="/blognews/create"> Yeni Yazı Əlave Et</a></h3>
                    </div>
                    <div class="panel-body">

                        <table id="table-1" class="table table-bordered table-striped">
                            <thead>
                            <th>Paylaşımın Adı</th>
                            <th>Yazar</th>
                            <th>Yenilənmə Tarixi</th>
                            <th>Status</th>
                            <th>Sil və Dəyiş</th>

                            </thead>
                            <tbody>


                              @foreach($blogNews as $new)

                              <tr>
                                <td>
                                  {{ $new->blog_name }}
                                </td>
                                <td>
                                    {{ $new->bloguser->name }}
                                </td>
                                <td>
                                  {{ $new->updated_at }}
                                </td>
                                <td>
                                  @if($new->status == '1')
                                  <span class="label label-success"> Dərc olunan </span>
                                  @elseif($new->status == '0')
                                  <span class="label label-danger"> Gözləmə </span>
                                  @endif
                                </td>



                              <td><a href="blognews/{!!$new->blog_id !!}/del" style="margin-left:30px; color:red;" >Sil</a> <a href="/blognews/{!! $new->blog_id !!}/edit" style="margin-left:30px; color:green;" >Düzəliş Et</a></td>

                              </tr>

                              @endforeach


                            </tbody>
                        </table>
                    {!! $blogNews->render() !!}
                </div>
            </div>

        </div>
        </div>

    </div>
    <!-- End Page Content -->

</aside>

@endsection
