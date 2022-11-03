@extends('layouts.app')

@section('content')
    <div class="container col-lg-4 py-5">
        {{-- Scanner --}}
        <div class="card bg-white shadow rounded-3 p-3 border-0"></div>

        {{-- Pesan --}}

        @if (session()->has('gagal'))
            <p>gagal</p>
        @endif

        @if (session()->has('success'))
            <p>sukses</p>
        @endif
        <video id="preview"></video>

        {{-- form --}}
        <form action="{{ route('store') }}" method="POST" id="form"></form>
        @csrf
        <input type="hidden" name="midtrans_booking_code" id="midtrans_booking_code">
        <div class="table-responsive mt-5">
            <table class="table table-bordered table-hover">
                <tr>
                    <th>OrderID</th>
                    <th>Status</th>
                    <th>Qty</th>
                </tr>
            </table>
        </div>
    </div>
   <script type="text/javascript" src="https://rawgit.com/schmich/instascan-builds/master/instascan.min.js"></script>
    <script type="text/javascript">
        let scanner = new Instascan.Scanner({
            video: document.getElementById('preview')
        });
        scanner.addListener('scan', function(content) {
            console.log(content);
        });
        Instascan.Camera.getCameras().then(function(cameras) {
            if (cameras.length > 0) {
                scanner.start(cameras[0]);
            } else {
                console.error('No cameras found.');
            }
        }).catch(function(e) {
            console.error(e);
        });

        scanner.addListener('scan', function(c) {
            document.getElementById('midtrans_booking_code').value = c;
            document.getElementById('form').submit();
        })
    </script>
    @endsection
