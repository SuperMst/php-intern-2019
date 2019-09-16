@component('mail::message')
# Your rent reservation has been registered

A rent reservation has been registered on your account <br>
Car reserved: {{ $rent->car->manufacturer }} {{ $rent->car->model }}, Year {{ $rent->car->year }} <br>
Start - End dates: {{ $rent->start_date }} {{ $rent->end_date }}

Thanks,<br>
{{ config('app.name') }}
@endcomponent
