@component('mail::message')
<img src="{{asset('sobsan')}}" alt="" width="100" height="100"> <br>
## Los.az Qeydiyyyat uğurla tamamlandı.

<table>
  <tr>
    <th style="border: 1px solid #dddddd;text-align: left;padding: 8px;">Şirkət adı</th>
    <th style="border: 1px solid #dddddd;text-align: left;padding: 8px;">Ad</th>
    <th style="border: 1px solid #dddddd;text-align: left;padding: 8px;">Ünvan</th>
    <th style="border: 1px solid #dddddd;text-align: left;padding: 8px;">Şəhər</th>
    <th style="border: 1px solid #dddddd;text-align: left;padding: 8px;">Telefon</th>
    <th style="border: 1px solid #dddddd;text-align: left;padding: 8px;">Email</th>
    <th style="border: 1px solid #dddddd;text-align: left;padding: 8px;">Ümumi məbləğ</th>
    <th style="border: 1px solid #dddddd;text-align: left;padding: 8px;">Çatdırılma məbləği</th>
  </tr>
  <tr>
    <td style="border: 1px solid #dddddd;text-align: left;padding: 8px;">{{ $details['company_name'] }}</td>
    <td style="border: 1px solid #dddddd;text-align: left;padding: 8px;">{{ $details['name'] }}</td>
    <td style="border: 1px solid #dddddd;text-align: left;padding: 8px;">{{ $details['address'] }}</td>
    <td style="border: 1px solid #dddddd;text-align: left;padding: 8px;">{{ $details['city'] }}</td>
    <td style="border: 1px solid #dddddd;text-align: left;padding: 8px;">{{ $details['telefon'] }}</td>
    <td style="border: 1px solid #dddddd;text-align: left;padding: 8px;">{{ $details['email'] }}</td>
    <td style="border: 1px solid #dddddd;text-align: left;padding: 8px;">{{ $details['total_price'] }}</td>
    <td style="border: 1px solid #dddddd;text-align: left;padding: 8px;">{{ $details['delivery_price'] }}</td>
  </tr>
</table>
<br>
<h4>Sifarişlər:</h4>

<table>
  <tr>
    <th style="border: 1px solid #dddddd;text-align: left;padding: 8px;">Məhsulun adı</th>
    <th style="border: 1px solid #dddddd;text-align: left;padding: 8px;">Məhsulun qiyməti</th>
    <th style="border: 1px solid #dddddd;text-align: left;padding: 8px;">Məhsulun sayı</th>
    <th style="border: 1px solid #dddddd;text-align: left;padding: 8px;">Endirim</th>
    <th style="border: 1px solid #dddddd;text-align: left;padding: 8px;">Məhsulun rəngi</th>
  </tr>
  @foreach($details['orders'] as $order)
  <tr>
    <td style="border: 1px solid #dddddd;text-align: left;padding: 8px;">{{ $order->title }}</td>
    <td style="border: 1px solid #dddddd;text-align: left;padding: 8px;">{{ $order->price }}</td>
    <td style="border: 1px solid #dddddd;text-align: left;padding: 8px;">{{ $order->quantity }}</td>
    <td style="border: 1px solid #dddddd;text-align: left;padding: 8px;">{{ $order->discount }}</td>
    <td style="border: 1px solid #dddddd;text-align: left;padding: 8px;">
        @if($order->pr_color)
        {{ \App\Colors::where('id',$order->pr_color)->first()->color_n_az }}
        @else
        -
        @endif
    </td>
  </tr>
  @endforeach
</table>

<hr>
 {{ config('app.name') }}
@endcomponent
