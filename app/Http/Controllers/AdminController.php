<?php

namespace App\Http\Controllers;

use App\admin;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        return view('login.login');
    }
    // fungsi untuk login
    public function process(Request $request)
    {
        $validateData = $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);
        $result = Admin::where('username', '=', $validateData['username'])->first();
        if ($result) {
            if (($request->password == $result->password)) {
                session(['username' => $request->username]);
                return redirect('/dashboard/dashboard');
            } else {
                return back()->withInput()->with('pesan', "Login Gagal, Username atau Password salah");
            }
        } else {
            return back()->withInput()->with('pesan', "Login Gagal, Username atau Password salah");
        }
    }
    public function logout()
    {
        session()->forget('username');
        return redirect('login')->with('pesan', 'Logout berhasil');
    }

    // fungsi untuk menampilkan data akun
    public function akun()
    {
        $mahasiswas = admin::all();
        return view('addakun.akun', ['students' => $mahasiswas]);
    }

    // fungsi untuk menambah data admin
    public function create()
    {
        return view('addakun.create');
    }

    public function store(Request $request)
    {
        $validateData = $request->validate([
            'nama' => 'required',
            'password' => 'required',

        ]);
        $mahasiswa = new admin();
        $mahasiswa->username = $validateData['nama'];
        $mahasiswa->password = $validateData['password'];
        $mahasiswa->save();
        $request->session()->flash('pesan', 'Penambahan data berhasil');
        return redirect()->route('addakun.akun');
    }
}
