<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTypeOfWord extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('typeword')) {
            Schema::create('typeword', function (Blueprint $table) {
                $table->id('type_id');
                $table->string('type_word');
                $table->foreign('type_id')->references('word_of_type_id')->on('gameword');
                $table->timestamps();
            });
        }

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('typeword');
    }
}
