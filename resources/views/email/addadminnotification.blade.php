@component('mail::message')
# {{$name}}, Your account created successfully as a Admin. Now you can login.
@component('mail::panel')
<P>Email Address: {{$email}}</P>
<p>Password: {{$password}}</p>

@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
