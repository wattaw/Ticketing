<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Demo extends Model
{
    use HasFactory;
    protected $fillable = ['user_id', 'event_id', 'payment_status', 'midtrans_url', 'midtrans_booking_code','discount_id','discount_percentage','total'];

}
