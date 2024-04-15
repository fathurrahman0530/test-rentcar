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
        Schema::create('companies', function (Blueprint $table) {
            $table->id();
            $table->char('uuid', 36)->unique();
            $table->string('name', 128);
            $table->longText('alamat')->nullable();
            $table->longText('maps')->nullable();
            $table->string('telp', 20)->nullable();
            $table->string('fax', 20)->nullable();
            $table->string('mobile_1', 15);
            $table->string('mobile_2', 15)->nullable();
            $table->string('email');
            $table->string('logo', 128)->nullable();
            $table->string('icon', 128)->nullable();
            $table->string('zona', 128)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('companies');
    }
};
