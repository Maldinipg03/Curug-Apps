<?php

namespace App\Http\Controllers;

use App\addimage;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        $slide = addimage::all();
        return view('index.index', [
            'slide' => $slide
        ]);
        // $slide = Home::all();


        // return view('index.index');
    }
}
