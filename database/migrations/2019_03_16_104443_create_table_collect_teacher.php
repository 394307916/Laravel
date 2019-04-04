<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableCollectTeacher extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('collect_teacher', function (Blueprint $table) {
            $table->increments('collect_teacher_id')->index();
            $table->string('openid');
            $table->integer('teacher_id');
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('collect_teacher', function (Blueprint $table) {
            Schema::dropIfExists('collect_teacher');
        });
    }
}
