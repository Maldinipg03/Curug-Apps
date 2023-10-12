<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\dataorder;
use App\order;
use ConsoleTVs\Charts\Facades\Charts;

class DashboardController extends Controller
{
    // public function index()
    // {
    //     return view('dashboard.dashboard');
    // }

    // menampilkan data
    public function index()
    {
        // $mahasiswas = dataorder::select('id', 'name', 'email', 'jml', 'status', 'created_at')->get();
        // $mahasiswas = dataorder::all();

        $bulanTerbaru = now()->startOfMonth(); //untuk menampilkan bulan terbaru saja

        $mahasiswas = dataorder::where('status', 'paid')
            ->whereYear('created_at', $bulanTerbaru->year)
            ->whereMonth('created_at', $bulanTerbaru->month)
            ->select('name', 'email', 'jml', 'status', 'created_at')
            ->orderBy('created_at', 'desc')
            ->get();
        return view('dashboard.dashboard', ['students' => $mahasiswas]);
    }

    // public function search(Request $request)
    // {
    //     $nama = $request->input('nama');

    //     // Lakukan pencarian berdasarkan nama di tabel "orders"
    //     $mahasiswas = Order::where('name', 'like', '%' . $nama . '%')
    //         ->where('status', 'paid')
    //         ->get();

    //     return view('dashboard.dashboard', ['students' => $mahasiswas]);
    // }
}
