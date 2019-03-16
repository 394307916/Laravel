<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableUserPublishTeacher extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_publish_teacher', function (Blueprint $table) {
            $table->increments('publish_teacher_id')->index();
            $table->string('openid');
            $table->integer('teacher_id');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('user_publish_teacher', function (Blueprint $table) {
            Schema::dropIfExists('user_publish_teacher');
        });
    }
}
