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
            $table->string('nama', 50);
            $table->string('j_identitas', 15);
            $table->bigInteger('n_identitas');
            $table->string('pekerjaan', 50);
            $table->string('jk');
            $table->text('alamat');
            $table->string('no_hp', 15);
            $table->string('keperluan');
            $table->string('tujuan');
            $table->date('tgl');
            $table->time('jam');
            $table->text('foto');
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
