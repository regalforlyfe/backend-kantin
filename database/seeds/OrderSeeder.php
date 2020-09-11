<?php

use Illuminate\Database\Seeder;
use App\Order;

class OrderSeeder extends Seeder
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
                'kode_order' => '5ASD0R',
                'jumlah' => '1',
                'id_pembeli' => '4',
                'id_toko' => '1',
                'id_produk' => '1',
                'created_at' => '2020-08-01 01:00:00',
            ],
            [
                'kode_order' => '92SADQ',
                'jumlah' => '1',
                'id_pembeli' => '4',
                'id_toko' => '2',
                'id_produk' => '2',
                'created_at' => '2020-08-01 01:00:00',
            ],
            ];
            Order::insert($data);
    }
}
