@component('mail::message')
<h2>Request Viewing</h2>
<p>{{ $mail_data['name'] }} has requested a viewing of Unit {{ $mail_data['unit_no'] }} at {{ $mail_data['property'] }} on {{ $mail_data['date'] }} at {{ $mail_data['time'] }}.</p> <br>

<div style="display:flex;">
@component('mail::button', ['url' => "https://alveolandcorp.online/appointment/approve/" . $mail_data['id'], 'color' => 'green'])
Accept
@endcomponent

@component('mail::button', ['url' => "https://alveolandcorp.online/appointment/decline/" . $mail_data['id'], 'color' => 'red'])
Decline
@endcomponent
</div>

@endcomponent