@component('mail::message')
# Register Order: {{$checkout->Event->title}}

Hi {{$checkout->User->name}}
<br>
Thank you for order on <b>{{$checkout->qty}} {{$checkout->Event->title}}</b>, please see payment instruction by click the button below.

@component('mail::button', ['url' => $checkout->midtrans_url])
Pay Now
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
