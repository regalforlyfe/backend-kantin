<?php

use Illuminate\Database\Seeder;
use App\Toko;

class TokoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data=[

            'nama_toko' => 'ibu kartini',
            'deskripsi' => 'toko ibu kartini',
            'alamat' => 'jl.ibu kita kartini',
            'hari_buka' => 'senin',
            'waktu_buka' => '10:00:00',
            'waktu_tutup' => '22:00:00',
            'metode_pembayaran' => 'cash',
            'metode_pengiriman' => 'antar',
            'whatsapp' => '085156487716',
            'maps' => 'https://g.page/gado-gado-bude-rus?share',
            'instagram' => 'kartiniaja',
            'facebook' => 'ibu kartini',
            'tokopedia' => 'kartinioke',
            'shopee' => 'kartinidong',
            'foto_toko' => 'null',
            'id_penjual' => '2',
            'rating' => '4.2',
            'status' => 'tidak aktif',
            'verifikasi' => 'belum terverifikasi'

        ];
          Toko::insert($data);
    }
}
