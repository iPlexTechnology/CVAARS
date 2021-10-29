@component('mail::message')

Dear {{ $body['name'] }}, <br>

You can obtain the second dose of the COVID-19 immunity vaccination at the same Vaccination Center you got the 1st dose
on {{ $body['date'] }} from 8:00 AM. <br>

# Please make sure to bring your National ID card. <br>

## STAY SAFE!

Thanks,<br>
{{ config('app.name') }}
@endcomponent
