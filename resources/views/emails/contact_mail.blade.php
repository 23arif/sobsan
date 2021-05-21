@component('mail::message')
<img src="{{asset('sobsan')}}" alt="" width="100" height="100"> <br>
# Los.az Əlaqə mesajı.

# Ad:
	{{ $details['name'] }}

# Başlıq:
	{{ $details['title'] }}

# Email:
	{{ $details['email'] }}

# Mesaj:
	{{ $details['message'] }}



<hr>
 {{ config('app.name') }}
@endcomponent
