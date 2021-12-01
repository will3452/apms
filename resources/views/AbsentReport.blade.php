@component('mail::message')
# Absent report

Hello Mrs/Mr {{$parent-> name}}, Today ( {{now()->format('m-d-Y')}} ), Your Son/daughter {{$user->name}} is absent from class.

Thanks,<br>
{{ config('app.name') }}
@endcomponent
