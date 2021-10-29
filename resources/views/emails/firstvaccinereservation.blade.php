@component('mail::message')

Dear {{ $body['name'] }}, <br>

We are pleased to inform you that, you can obtain your 1st dose of the COVID-19 immunity vaccine at the "{{
$body['venue'] }}" on "{{
$body['date'] }}", from 08.00 AM. <br>

# Please make sure to bring your National ID card. <br>

## STAY SAFE!

Thanks,<br>
{{ config('app.name') }}
@endcomponent
