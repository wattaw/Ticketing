<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Discount;
use App\Models\Checkout;
use App\Models\CheckoutDetail;
use App\Models\Event;
use App\Models\EventDetail;

class DemoController extends Controller
{
    public function store(Request $request)
    {
        // $validated = $request->validate([
        //     'item_name' => 'required|string|max:255',
        //     'sku' => 'required|string|regex:​​/^[a-zA-Z0-9]+$/',
        //     'price' => 'required|numeric'
        // ]);

        return $request->all();
    }

    public function demo(){
        $events = Event::all();
        $event_details = EventDetail::all();
        return view('demo',['event_details' => $event_details]);
        
    }

}
