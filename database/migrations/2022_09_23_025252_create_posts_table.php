<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->id();
            $table->foreignId('user_id')->nullable()->index('fk_post_to_user');
            $table->string('slug');
            $table->string('title');
            $table->longText('body');
            $table->enum('status', [0, 1, 2])->default(0);
            $table->enum('is_join_event', [0, 1]);
            $table->foreignId('event_id')->nullable()->index('fk_post_to_event');
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
