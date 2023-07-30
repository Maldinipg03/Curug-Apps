<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class addimage extends Model
{
    protected $table = "addimages";
    protected $primarykey = "id";
    protected $fillable = [
        'id', 'name', 'image'
    ];
}
