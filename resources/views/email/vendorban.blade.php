@component('mail::message')

@component('mail::panel')
# {{$name}}, Sorry!!! We have banned your account.

Shop Name: {{$shop}}

Contact us ASAP.
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
