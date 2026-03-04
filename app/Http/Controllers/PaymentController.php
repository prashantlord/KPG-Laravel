<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use Neputer\Facades\Khalti;

class PaymentController extends Controller
{
    public function pay(Request $request): RedirectResponse
    {
        $return_url = route('verify');
        $purchase_order_id = 123456789;
        $purchase_order_name = 1234;
        $amount = $request->cost * 100; // Your total amount in paisa Rs 1 = 100 paisa

        try {
            $response = Khalti::initiate($return_url, $purchase_order_id, $purchase_order_name, $amount);

            return Redirect::to($response->payment_url);
        } catch (\Throwable $exception) {
            dd($exception->getMessage());
        }
    }

    public function verify(Request $request): View
    {
        try {
            $pidx = $request->pidx;
            $response = Khalti::lookup($pidx);

            return view('index')->with(['message' => 'Payment Successful']);

        } catch (\Exception $exception) {
            dd('Payment Failed');
        }
    }
}
