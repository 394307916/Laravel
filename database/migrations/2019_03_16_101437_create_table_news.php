<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableNews extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('news', function (Blueprint $table) {
            $table->increments('new_id')->index();
            $table->string('openid');
            $table->string('address')->nullable();
            $table->string('cityname')->nullable();
            $table->string('del')->nullable();
            $table->string('details')->nullable();
            $table->string('dq_time')->nullable();
            $table->string('givelike')->nullable();
            $table->string('hb_keyword')->nullable();
            $table->string('hb_money')->nullable();
            $table->string('hb_num')->nullable();
            $table->string('hb_random')->nullable();
            $table->string('hb_type')->nullable();
            $table->string('hbfx_num')->nullable();
            $table->string('hong')->nullable();
            $table->string('hot')->nullable();
            $table->string('img')->nullable();
            $table->string('money')->nullable();
            $table->string('sh_time')->nullable();
            $table->string('state')->nullable();
            $table->string('store_id')->nullable();
            $table->string('time')->nullable();
            $table->string('top')->nullable();
            $table->string('top_type')->nullable();
            $table->string('type2_id')->nullable();
            $table->string('type2_name')->nullable();
            $table->string('type_id')->nullable();
            $table->string('type_name')->nullable();
            $table->string('uniacid')->nullable();
            $table->string('user_id')->nullable();
            $table->string('user_img')->nullable();
            $table->string('user_img2')->nullable();
            $table->string('user_name')->nullable();
            $table->string('user_tel')->nullable();
            $table->string('views')->nullable();
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
        Schema::table('news', function (Blueprint $table) {
            Schema::dropIfExists('news');
        });
    }
}
