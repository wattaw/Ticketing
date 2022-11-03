<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Checkout;
use App\Models\Validation;
use Illuminate\Http\Request;

class ValidationController extends Controller
{
    public function store(Request $request)
    {
        //Cek Data
        $cek = Checkout::where([
            'midtrans_booking_code'=> $request->midtrans_booking_code,
            'validation_status' => $request->validation_status,
            'qty' => $request->qty
        ])->first();
        if($cek){
            return redirect('/')->with('gagal','ID sudah tidak ada / divalidasi');
        }
        Validation::create([
            'validation_status' => $request->validation_status,
            'midtrans_booking_code'=> $request->midtrans_booking_code,
            'qty' => $request->qty
        ]);
        return redirect('/')->with('success','orderid sudah divalidasi');
    }
    public function scan(){
        // $qrcode = new Generator;
        // $qr =  $qrcode ->size(200)->generate(request()->get('CodeNumber'));
        return view('admin.qrscan',[
            // 'qr' => $qr
        ]);
    }
}
