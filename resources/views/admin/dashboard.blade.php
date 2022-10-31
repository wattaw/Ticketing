@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-8 offset-2">
                <div class="card mt-3">
                    <div class="card-header">
                        Admin Dashboard
                    </div>
                    <div class="card-body">
                        @include('components.alert')
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>User</th>
                                    <th>Event</th>
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
                                            Tes
                                        </td>
                                        <td>
                                        <a href="{{route('admin.dashboard')}}" class="btn btn-info">{{$checkout->midtrans_booking_code}}
                                        </a>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="3">No camps registered</td>
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