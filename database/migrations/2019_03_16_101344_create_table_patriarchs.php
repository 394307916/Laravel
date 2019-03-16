<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTablePatriarchs extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('patriarchs', function (Blueprint $table) {
            $table->increments('patriarch_id')->index();
            $table->string('openid');
            $table->string('avatar_url')->nullable();
            $table->string('city')->nullable();
            $table->string('country')->nullable();
            $table->string('grade')->nullable();
            $table->integer('is_completed')->nullable();
            $table->integer('is_matched')->nullable();
            $table->integer('is_order')->nullable();
            $table->integer('max_wage')->nullable();
            $table->integer('min_wage')->nullable();
            $table->string('name')->nullable();
            $table->string('nick_name')->nullable();
            $table->string('remark')->nullable();
            $table->integer('resumes_count')->nullable();
            $table->string('schedule')->nullable();
            $table->string('sex')->nullable();
            $table->integer('show_id')->nullable();
            $table->string('site')->nullable();
            $table->string('std_detail')->nullable();
            $table->string('std_feature')->nullable();
            $table->string('subject')->nullable();
            $table->string('tch_feature')->nullable();
            $table->string('tch_require')->nullable();
            $table->string('tch_sex')->nullable();
            $table->string('tel')->nullable();
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
        Schema::table('patriarchs', function (Blueprint $table) {
            Schema::dropIfExists('patriarchs');
        });
    }
}
