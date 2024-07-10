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
        Schema::create('pegawais', function (Blueprint $table) {
            $table->id();
            $table->string('nip')->unique();
            $table->string('nm_pegawai');
            $table->char('jk', 1);
            $table->string('tempat_lahir');
            $table->date('tgl_lahir');
            $table->string('agama')->nullable();
            $table->string('pendidikan')->nullable();
            $table->date('pangkat_tmt');
            $table->date('jabatan_tmt')->nullable();
            $table->string('keterangan')->nullable();
            // Foreign key untuk menghubungkan pegawai dengan pangkat
            $table->unsignedBigInteger('pangkat_id');
            $table->foreign('pangkat_id')->references('id')->on('pangkats')->onDelete('cascade')->onUpdate('cascade');
            // Foreign key untuk menghubungkan pegawai dengan jabatan
            $table->unsignedBigInteger('jabatan_id');
            $table->foreign('jabatan_id')->references('id')->on('jabatans')->onDelete('cascade')->onUpdate('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pegawais');
    }
};
