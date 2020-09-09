<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Produk extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('produk', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nama_produk');
            $table->string('deskripsi');
            $table->integer('harga');
            $table->unsignedBigInteger('id_kategori')->nullable();
            $table->unsignedBigInteger('id_toko')->nullable();
            $table->mediumtext('foto_produk')->nullable();
            $table->unsignedBigInteger('id_penjual')->nullable();
            $table->softDeletes();
            $table->timestamps();
            
            $table->foreign('id_kategori')->references('id')->on('kategori')->onDelete('cascade');
            $table->foreign('id_toko')->references('id')->on('toko')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('produk');
    }
}
