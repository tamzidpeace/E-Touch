@component('mail::message')
# E-Touch

Greetings from E-Touch Engineering LTD.

@component('mail::button', ['url' => ''])
{{ $mailData['feedback'] }}
@endcomponent



Thanks for contacting us.<br>

@endcomponent
