@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="card mt-4">
                    <div class="card-header">
                        Admin Dashboard
                        <form class="form-inline my-2 my-lg-0" type="get" action="{{ url('admin/search') }}">
                            <input class="form-control mr-sm-2" name="search_name" type="search" placeholder="Search">
                            <button class="btn btn-outline-light my-2 my-sm-0" type="submit">Search</button>
                        </form>
                    </div>
                    <div class="card-body">
                        @include('components.alert')
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Code Booking</th>
                                    <th>Name</th>
                                    <th>Qty</th>
                                    <th>Email</th>
                                    <th>Payment Status</th>
                                    <th>Check In Status</th>
                                    <th>Data Update</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($checkouts as $checkout)
                                    <tr>
                                        <td>{{ $checkout->midtrans_booking_code }}</td>
                                        <td>{{ $checkout->User->name }}</td>
                                        <td>{{ $checkout->qty }}</td>
                                        <td>{{ $checkout->User->email }}</td>
                                        <td>{{ $checkout->payment_status }}
                                        <td>{{ $checkout->validation_status}}</td>
                                        </td>
                                        <td>
                                            {{$checkout->updated_at}}
                                            {{-- {{$checkout->midtrans_booking_code}} --}}
                                            {{-- <a href="https://chart.googleapis.com/chart?chs=150x150&cht=qr&chl={{$checkout->midtrans_booking_code}}" class="btn btn-info" target="_blank">{{$checkout->midtrans_booking_code}}
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
