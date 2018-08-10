<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->text('post_title');
            $table->longText('post_content');

            $table->string('post_status',20)->default('public');
            $table->string('post_alias')->unique();

            $table->integer('comment_count')->default(0);
            $table->datetime('post_modified');

            $table->index(['post_status','post_alias','author_id','user_id']);

            $table->integer('author_id')->unsigned();
            $table->integer('user_id')->unsigned()->default(0);
            $table->integer('cat_id')->unsigned();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('posts');
    }
}
