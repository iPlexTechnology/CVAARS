@component('mail::message')

Dear {{ $body['name'] }}, <br>

This is to remind you that you have your COVID-19 immunity vaccination appointment tommorow.

# Bring your National ID card with you. <br>

## STAY SAFE!

Thanks,<br>
{{ config('app.name') }}
@endcomponent
