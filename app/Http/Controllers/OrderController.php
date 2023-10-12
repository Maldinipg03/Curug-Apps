<?php

namespace App\Http\Controllers;

use App\order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Mail\PembayaranBerhasil;
use Illuminate\Support\Facades\Mail;


class OrderController extends Controller
{
    public function index()
    {
        return view('transaksi.buy');
    }

    public function checkout(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'jml' => 'required|numeric',
            'name' => 'required',
            'email' => 'required|email',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $total_price = $request->jml * 10000;

        $batas_maksimum = 99999999999;
        if ($total_price > $batas_maksimum) {
            return redirect()->back()->with('error', 'Maaf, pesanan Anda melebihi batas maksimum yang diizinkan.');
        }

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
                'first_name' => $request->name,
                'last_name' => '',
                // 'name' => $request->name,
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

        if ($hashed == $request->signature_key) {
            if ($request->transaction_status == 'capture' or $request->transaction_status == 'settlement') {
                $order = Order::find($request->order_id);
                $order->update(['status' => 'paid']);

                // Pastikan Anda mengambil nilai-nilai dari pesanan dan mengaturnya ke dalam variabel
                $name = $order->name;
                $jml = $order->jml;
                $status = $order->status;
                $created_at = $order->created_at;
                $total_price = $order->total_price;

                // Sekarang, Anda dapat mengirim email dengan data-data ini
                $emailPenerima = $order->email;
                Mail::to($emailPenerima)->send(new PembayaranBerhasil(
                    $order->id,
                    $name,
                    $jml,
                    $status,
                    $created_at,
                    $total_price
                ));
            }
        }
    }


    public function kirimEmailPemberitahuan()
    {
        $ordersPaid = Order::where('status', 'paid')->get();

        foreach ($ordersPaid as $order) {
            // Ekstrak data pesanan ke dalam variabel
            $name = $order->name;
            $jml = $order->jml;
            $status = $order->status;
            $created_at = $order->created_at;
            $total_price = $order->total_price;
            $emailPenerima = $order->email;

            // Mengirim ID pesanan dan data-data lainnya ke view email
            Mail::to($emailPenerima)->send(new PembayaranBerhasil(
                $order->id,
                $name,
                $jml,
                $status,
                $created_at,
                $total_price
            ));
        }

        return "Email pemberitahuan telah dikirim kepada pengguna dengan status 'paid'.";
    }





    public function invoice($id)
    {
        $order = Order::find($id);
        return view('transaksi.invoice', compact('order'));
    }
}
