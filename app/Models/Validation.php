<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Checkout;
use Illuminate\Support\Facades\Auth;


class Validation extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = ['validation_status', 'midtrans_booking_code','qty'];

    public function checkout()
    {
        return $this->hasOne(Checkout::class,'midtrans_booking_code');
    }

}
