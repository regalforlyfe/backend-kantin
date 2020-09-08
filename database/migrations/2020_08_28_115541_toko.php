<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Toko extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('toko', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nama_toko');
            $table->string('deskripsi')->nullable();
            $table->string('alamat');
            $table->enum('hari_buka', ['senin', 'selasa','rabu', 'kamis','jumat','sabtu','minggu']);
            $table->time('waktu_buka');
            $table->time('waktu_tutup');
            $table->enum('metode_pembayaran', ['cash', 'gopay','ovo']);
            $table->enum('metode_pengiriman', ['antar', 'ojek online', 'paket', 'jemput']);
            $table->string('whatsapp');
            $table->string('maps');
            $table->string('instagram')->nullable();
            $table->string('facebook')->nullable();
            $table->string('tokopedia')->nullable();
            $table->string('shopee')->nullable();
            $table->mediumtext('foto_toko');
            $table->unsignedBigInteger('id_penjual')->nullable();
            $table->softDeletes();
            $table->timestamps();

            $table->unsignedInteger('rating')->nullable();
            $table->enum('status', ['tidak aktif', 'aktif']);
            $table->enum('verifikasi', ['belum terverifikasi', 'terverifikasi']);


            $table->foreign('id_penjual')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('toko');
    }
}
