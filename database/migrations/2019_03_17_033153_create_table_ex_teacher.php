<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableExTeacher extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ex_teacher', function (Blueprint $table) {
            $table->increments('ex_id')->index();
            $table->integer('teacher_id');
            $table->string('description')->nullable();
            $table->string('start_time')->nullable();
            $table->string('stop_time')->nullable();
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
        Schema::table('ex_teacher', function (Blueprint $table) {
            Schema::dropIfExists('ex_teacher');
        });
    }
}
