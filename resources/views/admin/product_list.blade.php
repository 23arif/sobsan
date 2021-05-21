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
                                    <li class="active"><a>Məhsullar</a></li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
                @if(isset($_GET['search']))
                    <h4 class="col-sm-12"><a href="{{url('/product_list')}}" style="display: block"
                                             class="btn btn-primary col-sm-2"><- Geri qayıt</a></h4>
                @endif
                <div class="col-sm-12">
                    <div class="panel panel-white">
                        <br>
                        <div class="row" style="margin:1em">
                            <div class="col-sm-3"><h3 class="panel-title">Məhsullar</h3></div>
                            <div class="col-sm-6">
                                <form method="get" action="{{route('prList')}}"
                                      style="margin:0;padding:0;display: flex;justify-content:flex-start ;height: 40px;width: 100%">
                                    <div class="form-group" style="width: 100%">
                                        <input type="search" class="form-control searchInput" placeholder="Axtar"
                                               name="search" onkeyup="searchPr()">
                                    </div>
                                    <div class="form-group">
                                        <button class="btn btn-primary form-control">Axtar</button>
                                    </div>
                                </form>
                            </div>
                            <div class="col-sm-3">
                                <h3 class="panel-title"><a href="{{asset('product_add')}}"> Əlavə et</a></h3>
                            </div>
                        </div>
                        <div class="panel-body">

                            <table id="table-1" class="table table-bordered table-striped">
                                <thead>
                                <th>Məhsul şəkli</th>
                                <th>Məhsul adı</th>
                                <th>Məhsul kateqoriya</th>
                                <th>Məhsul qiymət</th>
                                <th>Məhsul endirim</th>
                                <th>Göstər</th>
                                <th>Sil və ya Düzəliş et</th>

                                </thead>
                                <tbody>

                                @if(isset($products))
                                    @foreach($products as $product)

                                        <tr>
                                            <td>
                                                <img width="150" height="100"
                                                     style="max-width:100%;max-height:100%;width:auto;display:table;margin:0 auto;"
                                                     src="
                                                 @if($product->blog_img)
                                                     {{asset('public/Products/'.$product->blog_img)}}
                                                     @else
                                                     {{asset('assets/images/no_image.png')}}
                                                     @endif
                                                         " alt="">
                                            </td>
                                            <td>
                                                {{$product->getPr[0]->title}}
                                            </td>
                                            <td>
                                                @foreach($product->getPrCats as $p)
                                                    {{\App\Category::where('id',$p->cat_id)->first()->getCat->where('lang','az')->first()->name}}
                                                @endforeach
                                            </td>
                                            <td>
                                                {{$product->price}}
                                            </td>
                                            <td>
                                                @if($product->type == 1 && $product->discount_amount != 0.00)
                                                    {{$product->discount_amount}} %
                                                @elseif($product->type == 0 && $product->discount_amount != 0.00)
                                                    {{$product->discount_amount}} AZN
                                                @else
                                                    -
                                                @endif
                                            </td>
                                            <td class="text-center">
                                                <input class="text-white" type="checkbox"
                                                       @if($product->active == 1) checked
                                                       @endif data-toggle="toggle"
                                                       onchange="showHidePr(this,'{{$product->id}}')">
                                            </td>
                                            <td><a href="{{asset('product_delete/'.$product->id)}}"
                                                   style="margin-left:30px; color:red;">Sil</a> <a
                                                    href="{{asset('product_edit/'.$product->id)}}"
                                                    style="margin-left:30px; color:green;">Düzəliş et</a></td>

                                        </tr>

                                    @endforeach
                                @else
                                    @foreach($results as $result)
                                        @if($result->getPrId->destroy == 0)
                                            <tr>
                                                <td>
                                                    <img width="150" height="100"
                                                         src="
                                                                                             @if($result->getPrId->blog_img)
                                                         {{asset('public/Products/'.$result->getPrId->blog_img)}}
                                                         @else
                                                         {{asset('assets/images/no_image.png')}}
                                                         @endif
                                                             " alt="">
                                                </td>
                                                <td>
                                                    {{$result->title}}
                                                </td>
                                                <td>
                                                    {{$result->getPrId->price}}
                                                </td>
                                                <td>
                                                    {{$result->getPrId->discount}}
                                                </td>
                                                <td>
                                                    <input type="checkbox" @if($result->getPrId->active == 1) checked
                                                           @endif data-toggle="toggle"
                                                           onchange="showHidePr(this,'{{$result->getPrId->id}}')">
                                                </td>
                                                <td><a href="{{asset('product_delete/'.$result->getPrId->id)}}"
                                                       style="margin-left:30px; color:red;">Sil</a> <a
                                                        href="{{asset('product_edit/'.$result->getPrId->id)}}"
                                                        style="margin-left:30px; color:green;">Düzəliş et</a></td>

                                            </tr>
                                        @endif
                                    @endforeach
                                @endif

                                </tbody>
                            </table>
                            @if(isset($products))
                                {!! $products->render() !!}
                            @endif
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
        function showHidePr(t, prId) {
            $.ajax({
                url: "{{route('showProduct')}}",
                type: 'POST',
                data: {
                    '_token': "{{ csrf_token() }}",
                    'pr_id': prId,
                },
                success: function (response) {
                }
            });
        }
    </script>
@endsection
