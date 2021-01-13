<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSavesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('saves', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title');
            $table->double('plan');
            $table->date('target_date');
            $table->double('target_total');
            $table->double('current_save');
            $table->string('description');
            $table->string('image');
            $table->integer('user_id');
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
        Schema::dropIfExists('saves');
    }
}
