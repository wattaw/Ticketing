@component('mail::message')
# Register Ticket: {{$checkout->Camp->title}}

Hi {{$checkout->User->name}}
<br>
Thank you for order on <b>{{$checkout->Camp->title}}</b>, please see payment instruction by click the button below.

@component('mail::button', ['url' => $checkout->midtrans_url])
Pay Now
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
