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

    // hapus akun
    public function delete($id)
    {
        $data = admin::find($id);
        $data->delete();
        return redirect()->route('addakun.akun')->with('success', 'AKun Berhasil Di Hapus');
    }


    // fungsi untuk menampilkan data sebelum di edit
    public function tampilakun($id)
    {
        $data = admin::find($id);
        // dd($data);


        return view('addakun.tampil', compact('data'));
    }

    // fungsi edit data akun
    public function update(Request $request, $id)
    {
        $validateData = $request->validate([
            'username' => 'required',
            'password' => 'required',

        ]);

        $ubah = admin::findorfail($id);

        $data = [
            'username' => $request['username'],
            'password' => $request['password'],
        ];


        $ubah->update($data);
        return redirect()->route('addakun.akun');
    }
}
