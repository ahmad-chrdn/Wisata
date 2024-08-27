<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('destinations', function (Blueprint $table) {
            $table->id();
            // Foreign key untuk menghubungkan tabel destinasi dengan tabel kategori
            $table->unsignedBigInteger('kategori_id');
            $table->foreign('kategori_id')->references('id')->on('categories')->onDelete('cascade')->onUpdate('cascade');
            $table->string('nm_wisata');
            $table->string('keterangan');
            $table->string('gambar')->nullable();
            $table->decimal('latitude', 10, 8);
            $table->decimal('longitude', 11, 8);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('destinations');
    }
};

