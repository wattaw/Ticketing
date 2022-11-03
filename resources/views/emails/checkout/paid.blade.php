@component('mail::message')
# Your Order Has Been Confirmed

Hi {{$checkout->User->name}}
<br>
Your order has been paid, enjoy the ticket<br><b>{{$checkout->qty}} @if ($checkout->bonus==1){+ bonus tiket 1}@endif @if ($checkout->bonus==2){+ bonus tiket 2}@endif{{$checkout->Event->title}}</b>.
<br>
<br>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
    <tr>
        <td align="center">
            <img src="http://chart.googleapis.com/chart?chs=150x150&cht=qr&chl={{$checkout->midtrans_booking_code}}" style="width:20% ; margin: 0 auto;" alt="QRCode" class="mx-auto">
        {{-- <img src="{{secure_asset('storage/img/qr-code/'.$checkout->midtrans_booking_code.'.svg')}}" style="width:20% ; margin: 0 auto;" alt="QRCode" class="mx-auto"> --}}
        </td>
    </tr>
</table>
Thanks,<br>
{{ config('app.name') }}
@endcomponent
