<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class KirimEmailPembayaran extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:name';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        // return 0;
        // Ambil data order dengan status "paid"
        $orders = Order::where('status', 'paid')->get();

        foreach ($orders as $order) {
            // Kirim email kepada pelanggan
            Mail::to($order->customer_email)->send(new InvoicePaid($order));
        }

        $this->info('Email telah dikirim kepada pelanggan yang status ordernya "paid".');
    }
}
