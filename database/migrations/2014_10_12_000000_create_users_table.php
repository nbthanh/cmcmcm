<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->string('user_name',60)->unique();
            $table->string('user_pass');
            $table->string('user_nicename',50)->unique();
            $table->string('user_email',100)->unique();
            $table->string('user_avatar');
            $table->string('user_activation_key');
            $table->integer('user_status')->default(0);
            $table->string('display_name');
            $table->timestamps();
            $table->index(['user_name','user_nicename','user_email']);
            $table->rememberToken();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
