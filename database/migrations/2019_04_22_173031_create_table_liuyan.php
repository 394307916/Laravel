<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableLiuyan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('liuyan', function (Blueprint $table) {
            $table->increments('liuyan_id')->index();
            $table->string('user_openid')->nullable();
            $table->string('new_openid')->nullable();
            $table->string('new_id')->nullable();
            $table->string('text')->nullable();
            $table->integer('is_read')->nullable();
            $table->integer('redPoint')->nullable();
            $table->string('user_img')->nullable();
            $table->string('name')->nullable();
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
        Schema::table('liuyan', function (Blueprint $table) {
            Schema::dropIfExists('liuyan');
        });
    }
}
