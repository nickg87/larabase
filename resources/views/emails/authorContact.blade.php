@component('mail::message')
# You have a new message

Someone just used the form to send you a message.<br><br>
<b>Name:</b> {{$data['user_name']}} <br>
<b>Email:</b> {{$data['user_email']}}<br>
<b>Message:</b> <br>{{$data['message']}}  <br>


Thanks,<br>
{{ config('app.name') }}
@endcomponent
