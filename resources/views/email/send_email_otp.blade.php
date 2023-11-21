@component('mail::message')

    Hello {{ $user->name }}
    This is your OTP Verification Code: 
    
    Code: {!! $user->send_message !!}

For Details, Please Contact Us.
{{ config('app.name') }}
@endcomponent