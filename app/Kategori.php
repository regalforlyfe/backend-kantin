<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Kategori extends Model
{
    protected $table ='kategori';

    protected $fillable=[
        'nama_kategori',
        'deskripsi',

    ];

    use SoftDeletes;

}
