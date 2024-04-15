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
        Schema::create('activations', function (Blueprint $table) {
            $table->id();
            $table->char('uuid', 36)->unique();
            $table->string('company', 128);
            $table->string('username', 100);
            $table->string('password');
            $table->string('email', 128)->unique();
            $table->string('notelp')->unique();
            $table->string('verify', 6);
            $table->enum('status', ['P', 'D', 'T', 'M', 'F', 'X']);
            $table->date('expired')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('actvations');
    }
};
