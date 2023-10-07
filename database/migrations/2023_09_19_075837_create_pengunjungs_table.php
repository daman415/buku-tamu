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
        Schema::create('pengunjungs', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('j_identitas');
            $table->integer('n_identitas');
            $table->string('pekerjaan');
            $table->string('alamat');
            $table->string('no_hp');
            $table->string('keperluan');
            $table->string('tujuan');
            $table->string('jam');
            $table->longText('foto');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pengunjungs');
    }
};
