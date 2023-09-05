<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class dataorder extends Model
{
    protected $table = "orders";
    protected $primarykey = "id";
    protected $fillable = [
        'id', 'name', 'email', 'jml', 'status', 'created_ad'
    ];
}
