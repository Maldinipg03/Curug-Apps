<?php

namespace App\Http\Controllers;

use App\addimage;
use Illuminate\Http\Request;

class AddimageController extends Controller
{
    public function index()
    {
        $mahasiswas = addimage::all();
        return view('addimage.index', ['students' => $mahasiswas]);
    }

    public function create()
    {
        return view('addimage.create');
    }


    // fungsi untuk menambah gambar
    public function store(Request $request)
    {
        $validateData = $request->validate([
            'nama' => 'required|min:3|max:50',
            'image' => 'required|image|mimes:png,jpg',

        ]);
        $mahasiswa = new addimage();
        $mahasiswa->name = $validateData['nama'];
        if ($request->hasFile('image')) {
            $extFile = $request->image->getClientOriginalExtension();
            $namaFile = 'user-' . time() . "." . $extFile;
            $path = $request->image->move('assets/images', $namaFile);
            $mahasiswa->image = $path;
        }
        $mahasiswa->save();
        $request->session()->flash('pesan', 'Penambahan data berhasil');
        return redirect()->route('addimage.index');
    }



    // hapus gambar
    public function delete($id)
    {
        $data = addimage::find($id);
        $data->delete();
        return redirect()->route('addimage.index')->with('success', 'Gambar Berhasil Di Hapus');
    }


    // fungsi untuk menampilkan data sebelum di edit
    public function tampilfoto($id)
    {
        $data = addimage::find($id);
        // dd($data);


        return view('addimage.tampil', compact('data'));
    }

    // fungsi edit data gambar
    public function update(Request $request, $id)
    {
        $validateData = $request->validate([
            'nama' => 'required|min:3|max:50',
            'image' => 'required|image|mimes:png,jpg',

        ]);

        $ubah = addimage::findorfail($id);
        $awal = $ubah->image;

        $data = [
            'name' => $request['nama'],
            'gambar' => $awal,
        ];

        $request->image->move('assets/images', $awal);
        $ubah->update($data);
        return redirect()->route('addimage.index');
    }
}
