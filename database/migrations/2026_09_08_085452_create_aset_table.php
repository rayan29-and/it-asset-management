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
        Schema::create('aset', function (Blueprint $table) {
            $table->id();

            $table->string('kode_aset')->unique();
            $table->string('nama_aset');

            $table->foreignId('kategori_id')
                ->constrained('kategori_aset')
                ->cascadeOnUpdate()
                ->restrictOnDelete();

            $table->string('merk')->nullable();
            $table->string('model')->nullable();
            $table->string('nomor_seri')->nullable();

            $table->string('pengguna')->nullable();
            $table->string('lokasi')->nullable();

            $table->date('tanggal_perolehan')->nullable();

            $table->enum('kondisi', [
                'Baik',
                'Rusak Ringan',
                'Rusak Berat'
            ])->default('Baik');

            $table->enum('status', [
                'Aktif',
                'Maintenance',
                'Tidak Aktif'
            ])->default('Aktif');

            $table->text('keterangan')->nullable();
            $table->string('foto')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('aset');
    }
};
