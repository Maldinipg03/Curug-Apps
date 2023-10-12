<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\order;

class PembayaranBerhasil extends Mailable
{
    use SerializesModels;

    protected $order_id;

    public function __construct($order_id, $name, $status, $created_at, $total_price, $jml)
    {
        $this->order_id = $order_id;
        $this->name = $name;
        $this->jml = $jml;
        $this->status = $status;
        $this->created_at = $created_at;
        $this->total_price = $total_price;
    }

    public function build()
    {
        return $this->subject('Pembayaran Berhasil')
            ->view('emails.pembayaran-berhasil')
            ->with([
                'order_id' => $this->order_id,
                'name' => $this->name,
                'jml' => $this->jml,
                'status' => $this->status,
                'created_at' => $this->created_at,
                'total_price' => $this->total_price,
            ]);
    }
}
