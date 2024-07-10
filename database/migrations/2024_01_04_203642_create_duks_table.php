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
        Schema::create('duks', function (Blueprint $table) {
            $table->id();
            // Foreign key untuk menghubungkan duk dengan pegawai
            $table->unsignedBigInteger('pegawai_id');
            $table->foreign('pegawai_id')->references('id')->on('pegawais')->onDelete('cascade')->onUpdate('cascade');
            // Foreign key untuk menghubungkan duk dengan pangkat
            $table->unsignedBigInteger('pangkat_id');
            $table->foreign('pangkat_id')->references('id')->on('pangkats')->onDelete('cascade')->onUpdate('cascade');
            $table->date('pangkatYad_tmt');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('duks');
    }
};
