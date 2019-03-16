<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableTeachers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('teachers', function (Blueprint $table) {
            $table->increments('teacher_id')->index();
            $table->string('openid');
            $table->integer('diploma_auth')->nullable();
            $table->string('icon')->nullable();
            $table->string('grade')->nullable();
            $table->integer('identity_auth')->nullable();
            $table->string('introduction')->nullable();
            $table->integer('is_check')->nullable();
            $table->integer('is_collected')->nullable();
            $table->integer('is_inclass')->nullable();
            $table->integer('is_master')->nullable();
            $table->integer('is_online')->nullable();
            $table->integer('level')->nullable();
            $table->string('major')->nullable();
            $table->integer('min_wage')->nullable();
            $table->string('name')->nullable();
            $table->string('presence_imgs')->nullable();
            $table->string('region')->nullable();
            $table->string('school')->nullable();
            $table->string('sex')->nullable();
            $table->integer('status')->nullable();
            $table->string('teach_city')->nullable();
            $table->string('teach_country')->nullable();
            $table->string('teach_exprience')->nullable();
            $table->string('teach_feature')->nullable();
            $table->string('teach_grade')->nullable();
            $table->string('teach_review')->nullable();
            $table->string('teach_subject')->nullable();
            $table->integer('teacher_auth')->nullable();
            $table->string('tel')->nullable();
            $table->integer('trialclass_used')->nullable();
            $table->string('video')->nullable();
            $table->string('wechat')->nullable();
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
        Schema::table('teachers', function (Blueprint $table) {
            Schema::dropIfExists('teachers');
        });
    }
}
