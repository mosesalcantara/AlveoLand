@component('mail::message')
<h2>Dear {{ $mail_data['name'] }},</h2>
<p>Your request for a viewing of Unit {{ $mail_data['unit_no'] }} at {{ $mail_data['property'] }}, scheduled on {{ $mail_data['date'] }} at {{ $mail_data['time'] }} was {{ $mail_data['status'] }}.</p> <br>

<h2>Sincerely,</h2>
<p>Alveo Land</p>
@endcomponent