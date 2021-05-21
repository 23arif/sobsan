@extends('layouts.admin')

@section('content')
    <aside class="content-wrapper sidebarLeft">

        <!-- Page Content -->
        <div class="content container-fluid sidebarRight animated fadeInUp">
             <div class="row" style="display: flex;justify-content: flex-end;margin-top: 3em;margin-right: 3em"><a
                    href="{{route('invoice',['id'=>$order->id])}}" target=”_blank”><button class="btn btn-primary" aria-hidden="true"><i class="fa fa-print"></i> Print</button></a></div>
<br>
            <br>

            <div class="row col-sm-12">
                <table id="example" class="display nowrap" style="width:100%">
                <thead>
                <tr>
                    <th>Sıra:</th>
                    <th>Sifariş No:</th>
                    <th>Məhsul adı</th>
                    <th>Rəng</th>
                    <th>Məhsul say</th>
                    <th>Məhsul ədəd qiyməti(AZN)</th>
                    <th>Toplam qiymət(AZN)</th>
                </tr>
                </thead>
                <tbody>
                @foreach(json_decode($order->orders) as $z=>$o)
                    @php($z++)
                    <tr>
                        <th>{{$z}}</th>
                        <td>{{$order->order_no}}</td>
                        <td>{{$o->title}}</td>
                        <td>
                            @if(isset($o->pr_color))
                                {{\App\Colors::where('id',$o->pr_color)->first()->color_n_az}}
                            @else
                                -
                            @endif
                        </td>
                        <td>{{$o->quantity}}</td>
                        <td>{{$o->price}}</td>
                        <td>{{$o->price * $o->quantity}}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            </div>
            <div class="row">
            <form method="post" action="{{url('/order_update/'.$order->id)}}" id="statusUpdate">
                        {!! csrf_field() !!}
                <table class="table">
                  <thead>
                    <tr>
                      <th scope="col">Ad</th>
                      <th scope="col">Ünvan</th>
                      <th scope="col">E-mail</th>
                      <th scope="col">Telefon</th>
                      <th scope="col">Ödəniş növü</th>
                      <th scope="col">Sifariş<br> vaxtı</th>
                      <th scope="col">Status</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <th>{{$order->name}}</th>
                      <td>{{$order->address}}</td>
                      <td>{{$order->email}}</td>
                      <td>{{$order->telefon}}</td>
                      <td>
                          @if($order->order_type ==0)
                                        Individual
                                        @else
                                        Korporativ 
                                        @endif
                          </td>
                      <td>{{$order->order_date}}</td>
                      <td>
                      
                          <select class="form-control" name="order_status">
                                <option value = "0" @if($order->order_status == '0') selected @endif > Gözləyir</option>
                                <option value = "1" @if($order->order_status == '1') selected @endif> Çatdırılıb</option>
                                <option value = "2" @if($order->order_status == '2') selected @endif> Imtina</option>
                            </select>
                    
                      </td>
                    </tr>
                  </tbody>
                </table>
                
                      <div class="">
                      <button type="submit" class="btn btn-primary " onclick="form.submit()">Sifariş statusunu yenilə</button>    
                      </div>
                      </form>
                      <br>
                      <br>
                      <br>
                      
                    
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
        </div>
    </aside>
@endsection
@section('js')
    <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.7.0/js/dataTables.buttons.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.7.0/js/buttons.html5.min.js"></script>
    <script>
        $(document).ready(function () {
            $('#example').DataTable({
                dom: 'Bfrtip',
                buttons: [
                    'copy', 'excel'
                ]
            });
        });
    </script>
@endsection
