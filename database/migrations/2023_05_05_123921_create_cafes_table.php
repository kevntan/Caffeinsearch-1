<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cafes', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('lokasi');
            $table->binary('wfc_friendly');
            $table->binary('wifi');
            $table->binary('charging_port');
            $table->binary('lahan_parkir');
            $table->binary('smoking_area');
            $table->binary('mushola');
            $table->binary('toilet');
            $table->integer('range_harga');
            $table->integer('telepon');
            $table->time('operasional_buka');
            $table->time('operasional_tutup');
            $table->string('deskripsi');
            $table->string('maps');
            $table->string('foto');
            $table->string('foto2')->nullable();
            $table->string('foto3')->nullable();
            $table->foreignId('user_id')->constrained('users');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cafes');
    }
};
