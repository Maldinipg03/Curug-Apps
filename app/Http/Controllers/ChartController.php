<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\order;
use ConsoleTVs\Charts\Facades\Charts;


class ChartController extends Controller
{
    //


    public function index()
    {
        $paidCount = Order::where('status', 'paid')->count();
        $unpaidCount = Order::where('status', 'unpaid')->count();

        $chart = Charts::create('bar', 'chartjs')
            ->title('Status Transaksi')
            ->labels(['Paid', 'Unpaid'])
            ->values([$paidCount, $unpaidCount])
            ->responsive(false);

        return view('dashboard.dashboard', compact('chart'));
    }
}
