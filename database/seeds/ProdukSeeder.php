<?php

use Illuminate\Database\Seeder;
use App\Produk;

class ProdukSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data=[
            'nama_produk' => 'gado-gado',
            'deskripsi' => 'Gado-gado adalah salah satu makanan khas yang berasal dari Indonesia yang berupa sayur-sayuran yang direbus dan dicampur jadi satu, dengan bumbu kacang',
            'harga' => '15000',
            'id_kategori' => 1,
            'id_toko' => '1',
            'foto_produk' => 'null',
            'id_penjual' => '2',

        ];
          Produk::insert($data);
    }
}
