<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\User\Checkout\Store;
use App\Mail\Checkout\AfterCheckout;
use App\Mail\Checkout\Paid;
use App\Models\Camp;
use App\Models\Discount;
use App\Models\Checkout;
use App\Models\User;
use Auth;
use Mail;
use Str;
use Midtrans;

class PaidController extends Controller
{
    //
}
