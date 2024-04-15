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
        Schema::create('biodatas', function (Blueprint $table) {
            $table->id();
            $table->char('uuid', 36)->unique();
            $table->string('fullname', 128);
            $table->enum('gender', ['L', 'P'])->nullable();
            $table->string('tmpt_lahir', 128)->nullable();
            $table->date('tgl_lahir')->nullable();
            $table->longText('alamat')->nullable();
            $table->string('email', 100)->unique();
            $table->string('notelp', 20)->unique();
            $table->string('notelp_kerabat', 20)->nullable();
            $table->string('profile', 128)->nullable();
            $table->string('ktp', 128)->nullable();
            $table->string('pekerjaan', 128)->nullable();
            $table->string('foto_ktp', 128)->nullable();
            $table->char('uuid_user', 36)->unique();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('biodatas');
    }
};
