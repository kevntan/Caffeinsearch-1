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
            $table->string('alamat');
            $table->integer('wfc_friendly')->nullable();
            $table->integer('wifi')->nullable();
            $table->integer('charging_port')->nullable();
            $table->integer('lahan_parkir')->nullable();
            $table->integer('smoking_area')->nullable();
            $table->integer('mushola')->nullable();
            $table->integer('toilet')->nullable();
            $table->integer('range_harga')->nullable();
            $table->bigInteger('telepon')->nullable();
            $table->time('operasional_buka')->nullable();
            $table->time('operasional_tutup')->nullable();
            $table->string('deskripsi')->nullable();
            $table->string('maps')->nullable();
            $table->string('foto')->nullable();
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
