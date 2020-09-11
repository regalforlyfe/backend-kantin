<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Order extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('kode_order');
            $table->integer('jumlah')->nullable();
            $table->unsignedBigInteger('id_pembeli')->nullable();
            $table->unsignedBigInteger('id_toko')->nullable();
            $table->unsignedBigInteger('id_produk')->nullable();
            $table->softDeletes();
            $table->timestamps();

            $table->foreign('id_pembeli')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('id_toko')->references('id')->on('toko')->onDelete('cascade');
            $table->foreign('id_produk')->references('id')->on('produk')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('order');
    }
}
