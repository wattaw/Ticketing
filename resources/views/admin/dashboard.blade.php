@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="card mt-4">
                    <div class="card-header">
                        Admin Dashboard
                        <form class="form-inline my-2 my-lg-0" method="get" action="{{url('admin/search')}}">
                            <input class="form-control mr-sm-2" name="search_name" type="search" placeholder="Search by code booking">
                            <button class="btn btn-outline-light my-2 my-sm-0" type="submit">Search</button>
                        </form>
                    </div>
                    <div class="card-body">
                        @include('components.alert')
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>User</th>
                                    <th>Event</th>
                                    <th>Quantity</th>
                                    <th>Price</th>
                                    <th>Register Data</th>
                                    <th>Paid Status</th>
                                    <th>Check In Status</th>
                                    <th>Code Booking</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($checkouts as $checkout)
                                    <tr>
                                        <td>{{$checkout->User->name}}</td>
                                        <td>{{$checkout->Event->title}}</td>
                                        <td>{{$checkout->qty}}</td>
                                        <td>Rp. {{$checkout->total}}
                                        @if($checkout->discount_id)
                                            <span class="badge bg-success">Disc {{$checkout->discount_percentage}}%</span>
                                        @endif
                                        </td>
                                        <td>{{$checkout->created_at->format('M d Y')}}</td>
                                        <td>
                                            <strong>{{$checkout->payment_status}}</strong>
                                        </td>
                                        <td>
                                            <strong>{{$checkout->validation_status}}</strong>
                                        </td>
                                        <td>
                                            <img src="https://chart.googleapis.com/chart?chs=150x150&cht=qr&chl={{$checkout->midtrans_booking_code}}" onclick="sss">
                                        {{-- <a href="https://chart.googleapis.com/chart?chs=150x150&cht=qr&chl={{$checkout->midtrans_booking_code}}" >{{$checkout->midtrans_booking_code}}
                                        </a> --}}
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="3">No order registered</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

{{-- @push('script')
<script src="https://unpkg.com/html5-qrcode" type="text/javascript"></script>
<script>
    function onScanSuccess(decodedText, decodedResult) {
  // handle the scanned code as you like, for example:
  console.log(`Code matched = ${decodedText}`, decodedResult);
}

function onScanFailure(error) {
  // handle scan failure, usually better to ignore and keep scanning.
  // for example:
  console.warn(`Code scan error = ${error}`);
}

let html5QrcodeScanner = new Html5QrcodeScanner(
  "reader",
  { fps: 10, qrbox: {width: 250, height: 250} },
  /* verbose= */ false);
html5QrcodeScanner.render(onScanSuccess, onScanFailure);
</script>
@endpush --}}