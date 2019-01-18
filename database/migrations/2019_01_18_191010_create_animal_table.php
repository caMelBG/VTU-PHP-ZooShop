<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAnimalTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('animal', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 128);
            $table->integer('animal_type_id')->unsigned()->nullable();
            $table->integer('animal_breed_id')->unsigned()->nullable();
            $table->date('birth_date');
            $table->timestamps();

            $table->foreign('animal_type_id')
                ->references('id')->on('animal_type')
                ->onDelete('cascade');
            $table->foreign('animal_breed_id')
                ->references('id')->on('animal_breed')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('animal');
    }
}
