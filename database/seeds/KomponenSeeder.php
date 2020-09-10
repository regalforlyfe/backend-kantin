<?php

use Illuminate\Database\Seeder;
use App\Komponen;

class KomponenSeeder extends Seeder
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
                'id' => 'METODE_KIRIM_01',
                'nama_komponen' => 'Ambil Sendiri',
                'grup_komponen' => 'METODE_KIRIM',
                'nilai_komponen' => '',
                'deskripsi' => '',
            ],
            [
                'id' => 'METODE_KIRIM_02',
                'nama_komponen' => 'Paket',
                'grup_komponen' => 'METODE_KIRIM',
                'nilai_komponen' => '',
                'deskripsi' => '',
            ],
            [
                'id' => 'METODE_KIRIM_03',
                'nama_komponen' => 'Antar',
                'grup_komponen' => 'METODE_KIRIM',
                'nilai_komponen' => '',
                'deskripsi' => '',
            ],
            [
                'id' => 'STATUS_PENJUAL_01',
                'nama_komponen' => 'Tidak Aktif',
                'grup_komponen' => 'STATUS_PENJUAL',
                'nilai_komponen' => '',
                'deskripsi' => '',
            ],
            [
                'id' => 'STATUS_PENJUAL_02',
                'nama_komponen' => 'Aktif',
                'grup_komponen' => 'STATUS_PENJUAL',
                'nilai_komponen' => '',
                'deskripsi' => '',
            ],
            [
                'id' => 'METODE_PEMBAYARAN_01',
                'nama_komponen' => 'Cash',
                'grup_komponen' => 'METODE_PEMBAYARAN',
                'nilai_komponen' => '',
                'deskripsi' => '',
            ],
            [
                'id' => 'METODE_PEMBAYARAN_02',
                'nama_komponen' => 'OVO',
                'grup_komponen' => 'METODE_PEMBAYARAN',
                'nilai_komponen' => '',
                'deskripsi' => '',
            ],
            [
                'id' => 'METODE_PEMBAYARAN_03',
                'nama_komponen' => 'GoPay',
                'grup_komponen' => 'METODE_PEMBAYARAN',
                'nilai_komponen' => '',
                'deskripsi' => '',
            ],
            [
                'id' => 'HARI_01',
                'nama_komponen' => 'Senin',
                'grup_komponen' => 'HARI',
                'nilai_komponen' => '',
                'deskripsi' => '',
            ],
            [
                'id' => 'HARI_02',
                'nama_komponen' => 'Selasa',
                'grup_komponen' => 'HARI',
                'nilai_komponen' => '',
                'deskripsi' => '',
            ],
            [
                'id' => 'HARI_03',
                'nama_komponen' => 'Rabu',
                'grup_komponen' => 'HARI',
                'nilai_komponen' => '',
                'deskripsi' => '',
            ],
            [
                'id' => 'HARI_04',
                'nama_komponen' => 'Kamis',
                'grup_komponen' => 'HARI',
                'nilai_komponen' => '',
                'deskripsi' => '',
            ],
            [
                'id' => 'HARI_05',
                'nama_komponen' => 'Jumat',
                'grup_komponen' => 'HARI',
                'nilai_komponen' => '',
                'deskripsi' => '',
            ],
            [
                'id' => 'HARI_06',
                'nama_komponen' => 'Sabtu',
                'grup_komponen' => 'HARI',
                'nilai_komponen' => '',
                'deskripsi' => '',
            ],
            [
                'id' => 'HARI_07',
                'nama_komponen' => 'Minggu',
                'grup_komponen' => 'HARI',
                'nilai_komponen' => '',
                'deskripsi' => '',
            ],
        ];
          Komponen::insert($data);
    }
}
