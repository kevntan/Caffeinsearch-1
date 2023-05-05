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
        Schema::create('review_cafes', function (Blueprint $table) {
            $table->id();
            $table->integer('rating');
            $table->string('komentar');
            $table->string('foto');
            $table->foreignId('user_id')->constrained('users');
            $table->foreignId('cafe_id')->constrained('cafes');
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
        Schema::dropIfExists('review_cafes');
    }
};
