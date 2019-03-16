<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableCollectNew extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('collect_new', function (Blueprint $table) {
            $table->increments('collect_teacher_id')->index();
            $table->string('openid');
            $table->integer('new_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('collect_new', function (Blueprint $table) {
            Schema::dropIfExists('collect_new');
        });
    }
}
