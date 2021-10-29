@component('mail::message')

Dear {{ $body['name'] }},
<br>

Thank you for registering to obtain the COVID-19 immunity vaccination.
We will soon update you with the updates on the date and venue for your vaccination.<br>
# Stay safe!

Thanks,<br>
{{ config('app.name') }}
@endcomponent
