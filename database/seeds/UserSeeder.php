<?php

use Illuminate\Database\Seeder;
use App\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $data = [
        [
            'nama' => 'admin',
            'username'=>'admin',
            'email' => 'admin@admin.com',
            'email_verified_at'=>'2020-08-01 01:00:00',
            'tipe_user' => 'admin',
            'password' => bcrypt('adminpass'),
            'profil'=>'null',
            'foto_ktp'=>'null',
            'tanggal_lahir'=>'2020-08-01',
        ],
        [
            'nama' => 'kartini',
            'username'=>'ibukartini',
            'email' => 'kartini@admin.com',
            'email_verified_at'=>'2020-08-01 01:00:00',
            'tipe_user' => 'penjual',
            'password' => bcrypt('kartinipass'),
            'profil'=>'null',
            'foto_ktp'=>'null',
            'tanggal_lahir'=>'2020-08-01',
        ],
        [
            'nama' => 'pertiwi',
            'username'=>'ibupertiwi',
            'email' => 'pertiwi@admin.com',
            'email_verified_at'=>'2020-08-01 01:00:00',
            'tipe_users' => 'penjual',
            'password' => bcrypt('pertiwipass'),
            'tanggal_lahir'=>'2020-08-01',
        ]
        ];
        User::insert($data);
    }
}