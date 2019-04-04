<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableUserPublishNew extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_publish_new', function (Blueprint $table) {
            $table->increments('publish_new_id')->index();
            $table->string('openid');
            $table->integer('new_id');
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
        Schema::table('user_publish_new', function (Blueprint $table) {
            Schema::dropIfExists('user_publish_new');
        });
    }
}
