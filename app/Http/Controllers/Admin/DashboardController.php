<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Checkout;
use App\Models\Event;
use App\Models\User;
use App\Models\Validation;
use Auth;
use Psy\VersionUpdater\Checker;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class DashboardController extends Controller
{

    public function index()
    {
        // $checkouts = Checkout::with('Event', 'Validation')->get();
        QrCode::generate('midtrans_booking_code');
        $checkouts = Checkout::all();
        $validations  = Validation::all();
        $events = Event::all();
        return view(
            'admin.dashboard',
            [
                'checkouts' => $checkouts,
                'validations' => $validations,
                'events' => $events
            ]
        );
    }
    public function search(Request $request)
    {

        $get_name =  $request['search_name'] ?? "";
        if ($get_name != ""){
            $checkouts = Checkout::where('midtrans_booking_code', 'LIKE', '%' . $get_name . '%')->orWhere('qty', 'LIKE', '%' . $get_name . '%')->get();
        }
        else {
            $checkouts = Checkout::all();
        }
        return view('admin/search', compact('checkouts'));
    }
    
    }
