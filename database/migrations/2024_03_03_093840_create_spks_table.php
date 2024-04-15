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
        Schema::create('spks', function (Blueprint $table) {
            $table->id();
            $table->char('uuid', 36)->unique();
            $table->string('no_spk', 20);
            $table->date('tgl_ambil');
            $table->date('tgl_kembali');
            $table->time('jam_ambil');
            $table->time('jam_kembali');
            $table->enum('kat_pemakaian', ['LK', 'DD']);
            $table->string('tujuan', 128);
            $table->string('jaminan', 128);
            $table->enum('metode_pay', ['TF', 'CS']);
            $table->integer('total_payment');
            $table->integer('store_payment');
            $table->integer('denda')->nullable();
            $table->integer('kerusakan')->nullable();
            $table->integer('bbm')->nullable();
            $table->integer('tarif_sopir')->nullable();
            $table->longText('keterangan')->nullable();
            $table->integer('km_awal')->nullable();
            $table->integer('km_kembali')->nullable();
            $table->enum('status', ['T', 'F']);
            $table->char('uuid_driver', 36)->nullable();
            $table->char('uuid_unit', 36);
            $table->char('uuid_penyewa', 36);
            $table->char('uuid_user', 36);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('spks');
    }
};
