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
        Schema::create('profiles', function (Blueprint $table) {
            $table->id();

            // Informasi Dasar
            $table->string('nama_sekolah');
            $table->string('nama_bkk');
            $table->string('logo')->nullable();

            // Tentang Kami & Sejarah
            $table->text('tentang');
            $table->text('sejarah')->nullable(); // Kolom baru untuk sejarah

            // Visi & Misi
            $table->text('visi');
            $table->json('misi');

            // Kontak
            $table->string('alamat');
            $table->string('telepon');
            $table->string('email');
            $table->string('website')->nullable();

            // Media Sosial
            $table->string('instagram')->nullable();
            $table->string('facebook')->nullable();
            $table->string('twitter')->nullable();
            $table->string('tiktok')->nullable();

            // Informasi
            $table->integer('tahun_berdiri');

            // Jam Operasional
            $table->string('hari_operasional');
            $table->string('jam_operasional');

            // Struktur Organisasi
            $table->string('foto_struktur_organisasi')->nullable(); // Kolom baru untuk foto struktur organisasi

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('profiles');
    }
};
