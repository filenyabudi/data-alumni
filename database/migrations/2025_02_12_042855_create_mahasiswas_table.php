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
        Schema::create('mahasiswas', function (Blueprint $table) {
            $table->id();
            $table->integer('nim');
            $table->text('nama');
            $table->text('nik');
            $table->string('jk');
            $table->text('nama_ibu');
            $table->string('agama');
            $table->string('tempat_lahir');
            $table->date('tanggal_lahir');
            $table->text('alamat');
            $table->text('hp');
            $table->text('email_kampus');
            $table->text('email_pribadi');
            $table->string('tahun_masuk');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mahasiswas');
    }
};
