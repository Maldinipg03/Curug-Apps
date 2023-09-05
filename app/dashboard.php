<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class dashboard extends Model
{
    protected $table = 'orders'; // Ganti "nama_tabel_penjualan" sesuai dengan nama tabel Anda

    protected $fillable = [
        'created_at',
        'status',
        // Tambahkan kolom lain yang ingin Anda gunakan dalam model ini
    ];

    // Optional: Jika Anda ingin menonaktifkan timestamps (created_at dan updated_at)
    public $timestamps = false;

    // Jika kolom tanggal bukan tipe datetime, tambahkan properti berikut:
    // protected $dates = ['tanggal'];
}
