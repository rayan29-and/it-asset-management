<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('maintenance', function (Blueprint $table) {
            $table->id();

            $table->foreignId('aset_id')
                  ->constrained('aset')
                  ->cascadeOnUpdate()
                  ->cascadeOnDelete();

            $table->date('tanggal_masuk');

            $table->text('keluhan');

            $table->text('tindakan')->nullable();

            $table->string('teknisi')->nullable();

            $table->date('tanggal_selesai')->nullable();

            $table->enum('status', [
                'Proses',
                'Selesai'
            ])->default('Proses');

            $table->text('keterangan')->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('maintenance');
    }
};