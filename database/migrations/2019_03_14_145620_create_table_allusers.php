<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableAllusers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('allusers', function (Blueprint $table) {
            $table->string('openid');
            $table->string('session_key');
            $table->string('nickName');
            $table->string('avatarUrl');
            $table->string('province');
            $table->string('city');
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
        Schema::table('allusers', function (Blueprint $table) {
            Schema::dropIfExists('allusers');
        });
    }
}
