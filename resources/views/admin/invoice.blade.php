<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css"
          integrity="sha512-5A8nwdMOWrSz20fDsjczgUidUBR8liPYU+WymTZP1lmY9G6Oc7HlZv156XqnsgNUzTyMefFTcsFH/tnJE/+xBg=="
          crossorigin="anonymous"/>
    <title>Lucky | Invoice</title>
</head>
<body>
<style>
    p{
        margin-bottom:0;
    }
    .table>:not(caption)>*>* {
    padding: 0.1rem .5rem;
        
    }
    .invoice-details *,
    .invoice-details-2 * {
        width: auto;
    }

    .invoice-details,
    .invoice-details-2 {
        display: flex;
        justify-content: flex-start;
    }
    
    .invo-det p{
        font-weight:bold;
    }

    .invoice-details-2 div + div {
        margin-left: 15em;
    }

    .invoice-details p,
    .invoice-details-2 p {
        font-weight: bolder !important;
    }

    .invo-det p > span,
    .invoice-details-2 p {
        font-weight: normal;
    }

    @media print {
        .printBtn {
            display: none !important;
        }
        tbody, td, tfoot, th, thead, tr {
            border-color: inherit;
            border-style: solid;
            border-width: 0;
        }
    }
</style>
<div class="container">
    <div class="row printBtn" style="display: flex;justify-content: flex-end;margin-top: 3em;margin-right: 3em">
        <a style="display: block;width: auto">
            <button class="btn btn-primary" aria-hidden="true" onclick="window.print()"><i class="fa fa-print"></i>
                Print
            </button>
        </a>
    </div>
    <div class="row col-12">
        <img src="{{asset('/lucky/images/logo/logo-footer.svg')}}" alt="" width="100" height="100" class="mt-3 mb-5" style="width:auto">
    </div>
    <div class="row mb-4 invo-det">
        <div class="col-6">
            <p>G??nd??r??n: <span>Lucky Office Support</span></p>
            <p>V??en: <span>1505394481</span></p>
            
            <p>??nvan: <span>Fazayil Bayramov k??c., 3</span></p>
            <p>Tel: <span>(994) 99 832 07 77</span></p>
            
        </div>
        <div class="col-6">
            <p>??irk??t: <span>
               @if(\App\User::where('id',$order->user_id)->first()->company_name)
                        {{\App\User::where('id',$order->user_id)->first()->company_name}}
                    @else
                        -
                    @endif
            </span></p>
            <p>Sifari????i: <span>{{$order->name}}</span></p>
            <p>Sifari?? kodu: <span>{{$order->order_no}}</span></p>
            <p>Tarix: <span>{{date('d-m-Y h:m',strtotime($order->order_date))}}</span></p>
            <p>Tel: <span>{{$order->telefon}}</span></p>
            <p>??nvan: <span>{{$order->address}}</span></p>
        </div>
        
    </div>
    <div class="row">
        <table class="table">
            <thead>
            <tr>
                <th scope="col"># S??ra</th>
                <th scope="col">M??hsul ad??</th>
                <th scope="col">R??ng</th>
                <th scope="col">??d??d</th>
                <th scope="col">??d??d qiym??ti</th>
                <th scope="col">C??mi(AZN)</th>
            </tr>
            </thead>
            <tbody>
            @php($totalQty =0)
            @php($totalSinglePrice = 0)

            @foreach(json_decode($order->orders) as $z=>$o)
                @php($z++)
                <tr>
                    <th scope="row">{{$z}}</th>
                    <td>{{$o->title}}</td>
                    <td>
                        @if($o->pr_color)
                            {{\App\Colors::where('id',$o->pr_color)->first()->color_n_az}}
                        @else
                            -
                        @endif
                    </td>
                    <td>{{$o->quantity}}</td>
                    <td>{{$o->price}}</td>
                    <td>{{number_format($o->price * $o->quantity,2)}}</td>
                </tr>
                @php($totalQty +=$o->quantity)
                @php($totalSinglePrice +=$o->price)
            @endforeach
            </tbody>
            <tfooter>
                <tr>
                    <td>
                    </td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td><b>??atd??r??lma:</b></td>
                    <td>{{number_format($order->delivery_price,2)}} AZN</td>
                </tr>
                <tr>
                    <td>
                    </td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td><b>??mumi:</b></td>
                    <td>{{number_format($order->total_price+$order->delivery_price,2)}} AZN</td>
                </tr>
            </tfooter>
        </table>
    </div>
    <div class="row invoice-details-2 mt-4">
        <div>
            <p>T??hfil verdi: </p>
            <p>??mza: </p>
        </div>
        <div>
            <p>T??hfil ald??: </p>
            <p>??mza: </p>
        </div>
    </div>
</div>

</body>
</html>
