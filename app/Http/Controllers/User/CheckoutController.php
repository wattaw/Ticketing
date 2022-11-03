<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\User\Checkout\Store;
use App\Mail\Checkout\AfterCheckout;
use App\Mail\Checkout\Paid;
use App\Models\Event;
use App\Models\Discount;
use App\Models\Checkout;
use App\Models\EventDetail;
use App\Models\User;
use Auth;
use Mail;
use Str;
use Midtrans;

class CheckoutController extends Controller
{

    public function __construct()
    {
        Midtrans\Config::$serverKey = env('MIDTRANS_SERVERKEY');
        Midtrans\Config::$isProduction = env('MIDTRANS_IS_PRODUCTION');
        Midtrans\Config::$isSanitized = env('MIDTRANS_IS_SANITIZED');
        Midtrans\Config::$is3ds = env('MIDTRANS_IS_3DS');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Event $event, Request $request,EventDetail $event_details)
    {
        if ($event->isRegistered) {
            $request->session()->flash('error', "You already registered on {$event->title}.");
            return redirect(route('user.dashboard'));
        }
        $event_details = EventDetail::all();
        return view('checkout.create', [
            'event' => $event,
            'event_details' => $event_details
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Store $request, Event $event, Checkout $checkout, User $user, EventDetail $event_detail)
    {
        // mapping request data
        $data = $request->all();
        //$data['user_id'] = $checkout->user_id;
        // update user data
        $user = User::create($data);
        $user->email = $data['email'];
        $user->name = $data['name'];
        $user->occupation = $data['occupation'];
        $user->phone = $data['phone'];
        $user->address = $data['address'];
        // $user->price = $event_detail->price;
        $user->save();
        $data['qty']= $request->qty;
        $data['user_id'] = $user['id'];
        $data['event_id'] = $event->id;


        // checkout discount
        if ($request->discount) {
            $discount = Discount::whereCode($request->discount)->first();
            $data['discount_id'] = $discount->id;
            $data['discount_percentage'] = $discount->percentage;
        }


        // create checkout
        $checkout = Checkout::create($data);
        $this->getSnapRedirect($checkout);

        //sending email
        Mail::to($data['email'])->send(new AfterCheckout($checkout));

        return redirect("{$checkout->midtrans_url}");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Checkout  $checkout
     * @return \Illuminate\Http\Response
     */
    public function show(Checkout $checkout)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Checkout  $checkout
     * @return \Illuminate\Http\Response
     */
    public function edit(Checkout $checkout)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Checkout  $checkout
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Checkout $checkout)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Checkout  $checkout
     * @return \Illuminate\Http\Response
     */
    public function destroy(Checkout $checkout)
    {
        //
    }

    public function success()
    {
        return view('checkout.success');
    }

    /**
     * Midtrans Handler
     */
    public function getSnapRedirect(Checkout $checkout)
    {
        // dd($checkout);
        $orderId = $checkout->id . '-' . Str::random(5);
        $price = $checkout->Event->price;

        $checkout->midtrans_booking_code = $orderId;

        $item_details[] = [
            'id' => $orderId,
            'price' => $price,
            'quantity' => $checkout->qty,
            'name' => "Payment for {$checkout->Event->title} Ticket"
        ];
        
        $gratisan = 0;
        if ($checkout->qty >= 5){
            $checkout->bonus = 1;
            $gratisan += $gratisan;
            $item_details[] = [
                'id' => $orderId,
                'price' => 0,
                'quantity' => $checkout->bonus,
                'name' => "Bonus ticket kelipatan 5"
            ];
        }

        if ($checkout->qty == 10){
            $checkout->bonus = 2;
            $gratisan += $gratisan;
            $item_details[] = [
                'id' => $orderId,
                'price' => 0,
                'quantity' => $checkout->bonus,
                'name' => "Bonus ticket kelipatan 5"
            ];
        }

        


        $discountPrice = 0;
        if ($checkout->Discount) {
            $discountPrice = $price * $checkout->qty * $checkout->discount_percentage / 100;
            $item_details[] = [
                'id' => $checkout->Discount->code,
                'price' => -$discountPrice,
                'quantity' => 1,
                'name' => "Discount for {$checkout->Discount->name} {$checkout->discount_percentage}%"
            ];
        }

        $pajak[] = [
            'id' => $orderId,
            'price' => 5000,
            'quantity' => 1,
            'name' => "Tax & Services"
        ];

        $total = $price * $checkout->qty - $discountPrice + $pajak;
        $transaction_details = [
            'order_id' => $orderId,
            'gross_amount' => $price
        ];

        $userData = [
            "first_name" => $checkout->User->name,
            "last_name" => "",
            "address" => $checkout->User->address,
            "city" => "",
            "postal_code" => "",
            "phone" => $checkout->User->phone,
            "country_code" => "IDN",
        ];

        $customer_details = [
            "first_name" => $checkout->User->name,
            "last_name" => "",
            "email" => $checkout->User->email,
            "phone" => $checkout->User->phone,
            "billing_address" => $userData,
            "shipping_address" => $userData,

        ];

        $midtrans_params = [
            'transaction_details' => $transaction_details,
            'customer_details' => $customer_details,
            'item_details' => $item_details,
        ];

        try {
            // Get Snap Payment Page URL
            $paymentUrl = \Midtrans\Snap::createTransaction($midtrans_params)->redirect_url;
            $checkout->midtrans_url = $paymentUrl;
            $checkout->total = $total;
            $checkout->save();

            return $paymentUrl;
        } catch (Exception $e) {
            return false;
        }
    }

    public function midtransCallback(Request $request)
    {
        $checkout = Checkout::where('midtrans_booking_code', $request->order_id)->first();
        //dd($checkout->user->email);
        $notif = $request->method() == 'POST' ? new Midtrans\Notification() : Midtrans\Transaction::status($request->order_id);

        $transaction_status = $notif->transaction_status;
        $fraud = $notif->fraud_status;

        $checkout_id = explode('-', $notif->order_id)[0];
        $checkout = Checkout::find($checkout_id);

        if ($transaction_status == 'capture') {
            if ($fraud == 'challenge') {
                // TODO Set payment status in merchant's database to 'challenge'
                $checkout->payment_status = 'pending';
            } else if ($fraud == 'accept') {
                // TODO Set payment status in merchant's database to 'success'

                // //sending email

                // $image = \QrCode::format('svg')
                //     ->size(200)->errorCorrection('H')
                //     ->generate('$checkout->midtrans_booking_code');
                // $output_file = '/img/qr-code/' . $checkout->midtrans_booking_code . '.svg';
                // \Storage::disk('public')->put($output_file, $image);

                Mail::to($checkout->user->email)
                    ->send(new Paid($checkout, $transaction_status));
                $checkout->payment_status = 'paid';
            }
        } else if ($transaction_status == 'cancel') {
            if ($fraud == 'challenge') {
                // TODO Set payment status in merchant's database to 'failure'
                $checkout->payment_status = 'failed';
            } else if ($fraud == 'accept') {
                // TODO Set payment status in merchant's database to 'failure'
                $checkout->payment_status = 'failed';
            }
        } else if ($transaction_status == 'deny') {
            // TODO Set payment status in merchant's database to 'failure'
            $checkout->payment_status = 'failed';
        } else if ($transaction_status == 'settlement') {
            // TODO set payment status in merchant's database to 'Settlement'
            $checkout->payment_status = 'paid';
            Mail::to($checkout->user->email)
                    ->send(new Paid($checkout, $transaction_status));
        } else if ($transaction_status == 'pending') {
            // TODO set payment status in merchant's database to 'Pending'
            $checkout->payment_status = 'pending';
        } else if ($transaction_status == 'expire') {
            // TODO set payment status in merchant's database to 'expire'
            $checkout->payment_status = 'failed';
        }

        $checkout->save();

        return view('checkout/success');
    }
}
