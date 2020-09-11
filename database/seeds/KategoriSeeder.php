<?php

use Illuminate\Database\Seeder;
use App\Kategori;

class KategoriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data=[
        [
            'nama_kategori' => 'makanan',
            'deskripsi' => 'Makanan adalah',
        ],
        [
            'nama_kategori' => 'minuman',
            'deskripsi' => 'Minuman adalah ',
        ],
        [
            'nama_kategori' => 'pakaian',
            'deskripsi' => 'pakaian adalah ',
        ],
        [
            'nama_kategori' => 'lainnya',
            'deskripsi' => 'lainnya adalah ',
        ],
        ];
        Kategori::insert($data);
    }
}
