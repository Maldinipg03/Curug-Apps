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
        $mahasiswas = dataorder::where('status', 'paid')
            ->select('name', 'email', 'jml', 'status', 'created_at')
            ->orderBy('created_at', 'desc')
            ->get();
        return view('dashboard.dashboard', ['students' => $mahasiswas]);
    }
}
