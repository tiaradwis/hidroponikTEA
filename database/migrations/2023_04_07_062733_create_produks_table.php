<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('produks', function (Blueprint $table) {
            $table->id('id_produk');
            $table->string('nama_produk')->nullable();
            $table->integer('harga_produk')->nullable();
            $table->unsignedBigInteger('id_kategori')->nullable();
            $table->unsignedBigInteger('id_user')->nullable();
            $table->string('varietas_produk')->nullable();
            $table->string('panen_usia')->nullable();
            $table->string('bobot_rata_rata')->nullable();
            $table->string('ks_ruangan')->nullable();
            $table->string('ks_kulkas')->nullable();
            $table->string('pestisida')->nullable();
            $table->text('deskripsi_produk')->nullable();
            $table->string('kapasitas_produksi')->nullable();
            $table->string('opsi_pengiriman')->nullable();
            
            $table->string('photo_produk_1')->nullable();
            $table->string('photo_produk_2')->nullable();
            $table->string('photo_produk_3')->nullable();
            $table->integer('click_produk')->default(0);
            $table->integer('click_keranjang')->default(0);
            $table->timestamps();

            $table->foreign('id_user')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('id_kategori')->references('id_kategori')->on('kategoris')->onDelete('cascade');
            
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('produks');
    }
};


