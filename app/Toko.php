<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Toko extends Model
{
    protected $table ='toko';

    protected $fillable=[
        'nama_toko',
        'deskripsi',
        'alamat',
        'hari_buka',
        'waktu_buka',
        'waktu_tutup',
        'metode_pembayaran',
        'metode_pengiriman',
        'whatsapp',
        'maps',
        'instagram',
        'facebook',
        'tokopedia',
        'shopee',
        'foto_toko',
        'id_penjual',
        'rating',
        'status',
        'verifikasi',
    ];

    use SoftDeletes;

    public function penjual(){
        return $this->belongsTo('App\User', 'id_penjual');
    }
}
