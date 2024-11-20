<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('laporan', function (Blueprint $table) {
            $table->id(); // Kolom id sebagai auto_increment primary key
            $table->unsignedBigInteger('id_barang'); // Kolom id_barang tanpa auto_increment
            $table->unsignedBigInteger('id_transaksi');
            $table->string('nama_barang');
            $table->integer('quantity');
            $table->decimal('total', 10, 2);
            $table->date('tanggal_laporan');
            $table->timestamps();

            // Tambahkan foreign key
            $table->foreign('id_barang')->references('id')->on('barang')->onDelete('cascade');
            $table->foreign('id_transaksi')->references('id')->on('transactions')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('laporan');
    }
};