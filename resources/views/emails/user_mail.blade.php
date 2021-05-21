@component('mail::message')
<img src="{{asset('sobsan')}}" alt="" width="100" height="100"> <br>
# Los.az Qeydiyyyat uğurla tamamlandı.

# Login:
	{{ $details['login'] }}

# Şifrə:
	{{ $details['password'] }}

# Qeydiyyatı tamamlamaq üçün linkə tıklayın:
	{{$details['url']}}



<hr>
 {{ config('app.name') }}
@endcomponent
