@component('mail::message')
<img src="{{asset('sobsan')}}" alt="" width="100" height="100"> <br>
# Los.az.

# Şifrəni yeniləmək üçün linkə tıklayın:
	{{$details['url']}}



<hr>
 {{ config('app.name') }}
@endcomponent
