<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Settings;
use Illuminate\Http\Request;
use App\Models\PaymentMethod;


class FrontendController extends Controller
{
    public $theme;
    public function __construct()
    {
        $this->theme = config('app.theme', 'front2');
    }
    public function home()
    {
        $setting = Settings::first();
        $info = [];
        $payment_methods = PaymentMethod::latest()->where('status', 1)->get();
        return view("$this->theme.home", compact('setting', 'payment_methods'));
    }

    public function searchOrder(Request $request)
    {
        // dd('hey');
       $request->validate([
            'cargo_tracking_number' => 'required',
         ]);
        
         $info = Order::where('order_num', $request->cargo_tracking_number)->firstOrFail();
         
       return view("$this->theme.home", compact('info'));
    }


}
