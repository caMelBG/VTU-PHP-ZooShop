<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddSubjectsToSamplesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('samples', function (Blueprint $table) {
            $table->integer('subject_id')
                ->unsigned()->nullable()->default(null);

            Schema::disableForeignKeyConstraints();
            $table->foreign('subject_id')
                ->references('id')->on('subjects');
            Schema::enableForeignKeyConstraints();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('samples', function (Blueprint $table) {
            $table->dropForeign('samples_subject_id_foreign');
            $table->dropColumn('subject_id');
        });
    }
}
