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
            $table->enum('hari_buka', ['senin', 'selasa','rabu', 'kamis','jumat','sabtu','minggu'])->nullable();
            $table->time('waktu_buka');
            $table->time('waktu_tutup');
            $table->enum('metode_pembayaran', ['cash', 'gopay','ovo'])->nullable();
            $table->enum('metode_pengiriman', ['antar', 'ojek online', 'paket', 'jemput'])->nullable();
            $table->string('whatsapp');
            $table->string('maps');
            $table->string('instagram')->nullable();
            $table->string('facebook')->nullable();
            $table->string('tokopedia')->nullable();
            $table->string('shopee')->nullable();
            $table->mediumtext('foto_toko')->nullable();
            $table->unsignedBigInteger('id_penjual')->nullable();
            $table->softDeletes();
            $table->timestamps();

            $table->float('rating')->nullable();
            $table->enum('status', ['tidak aktif', 'aktif'])->nullable();
            $table->enum('verifikasi', ['belum terverifikasi', 'terverifikasi'])->nullable();


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
