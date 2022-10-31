@component('mail::message')
# Your Transaction Has Been Confirmed

Hi {{$checkout->User->name}}
<br>
Your transaction has been confirmed, now you can enjoy the benefits of <b>{{$checkout->Event->title}}</b> camp.
{{ $transaction_status }}
<br>
<br>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
    <tr>
        <td align="center">
            <img src="http://chart.googleapis.com/chart?chs=150x150&cht={{$checkout->midtrans_booking_code}}" style="width:20% ; margin: 0 auto;" alt="QRCode" class="mx-auto">
        {{-- <img src="{{secure_asset('storage/img/qr-code/'.$checkout->midtrans_booking_code.'.svg')}}" style="width:20% ; margin: 0 auto;" alt="QRCode" class="mx-auto"> --}}
        </td>
    </tr>
</table>
Thanks,<br>
{{ config('app.name') }}
@endcomponent
