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
        Schema::create('games', function (Blueprint $table) {
            $table->id();
            $table->boolean('active');
            $table->timestamp('start');
            $table->timestamp('end')->nullable();
            $table->timestamp( 'time_needed')->nullable();
            $table->integer('total_time_sec')->nullable();
            $table->boolean('joker5050');
            $table->boolean('jokerAudience');
            $table->boolean('jokerFriend');
            $table->foreignId('user_id');
            $table->foreignId('question_id');
            $table->foreignId('gamestage_id')->nullable();
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
        Schema::dropIfExists('games');
    }
};
