@component('mail::message')

@component('mail::panel')
<p>{{$info['subject']}}</p>
<P>{{$info['name']}}</P>
<P>{{$info['email']}}</P>
<p>{{$info['message']}}</p>

@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
