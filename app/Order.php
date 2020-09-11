<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model
{
    protected $table ='order';

    protected $fillable=[
        'kode_order',
        'jumlah',
        'id_pembeli',
        'id_toko',
        'id_produk',
        'created_at',
    ];

    use SoftDeletes;

    public function pembeli(){
        return $this->belongsTo('App\User', 'id_pembeli');
    }
    public function toko(){
        return $this->belongsTo('App\Toko', 'id_toko');
    }
    public function produk(){
        return $this->belongsTo('App\Produk', 'id_produk');
    }
}
