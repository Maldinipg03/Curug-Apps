<?php

namespace App\Http\Controllers;

use App\order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        return view('transaksi.buy');
    }

    public function checkout(Request $request)
    {
        $request->request->add(['total_price' => $request->jml * 10000, 'status' => 'unpaid']);
        // dd($request->all());
        $order = order::create($request->all());

        // Set your Merchant Server Key
        \Midtrans\Config::$serverKey = config('midtrans.server_key'); //ganti server key sesuai dengan yang dibuat di file midtrans.php
        // Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transaction).
        \Midtrans\Config::$isProduction = false;
        // Set sanitization on (default)
        \Midtrans\Config::$isSanitized = true;
        // Set 3DS transaction for credit card to true
        \Midtrans\Config::$is3ds = true;

        $params = array(
            'transaction_details' => array(
                'order_id' => $order->id,
                'gross_amount' => $order->total_price,
            ),
            'customer_details' => array(
                'name' => $request->name,
                'email' => $request->email,

            ),
        );

        $snapToken = \Midtrans\Snap::getSnapToken($params);
        // dd($snapToken);
        return view('transaksi.beli', compact('snapToken', 'order'));
    }

    // fungsi callback yang berguna menampilkan halaman setelah berhasil melakukan pembayaran
    public function callback(Request $request)
    {
        $serverKey = config('midtrans.server_key');
        $hashed = hash("sha512", $request->order_id . $request->status_code . $request->gross_amount . $serverKey);
        if ($hashed == $request->signature_key); {
            if ($request->transaction_status == 'capture') {
                $order = Order::find($request->order_id);
                $order->update(['status' => 'paid']);
            }
        }
    }

    public function invoice($id)
    {
        $order = Order::find($id);
        return view('transaksi.invoice', compact('order'));
    }
}
