<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Produk extends Model
{
    protected $table ='produk';

    protected $fillable=[
        'nama_produk',
        'deskripsi',
        'harga',
        'id_kategori',
        'id_toko',
        'foto_produk',
    ];

    use SoftDeletes;

    public function kategori(){
        return $this->belongsTo('App\Kategori', 'id_kategori');
    }
    public function toko(){
        return $this->belongsTo('App\Toko', 'id_toko');
    }
}
