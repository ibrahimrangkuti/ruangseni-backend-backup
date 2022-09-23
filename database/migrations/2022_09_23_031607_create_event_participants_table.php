<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEventParticipantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('event_participants', function (Blueprint $table) {
            $table->id();
            $table->foreignId('event_id')->nullable()->index('fk_event_participants_to_event');
            $table->foreignId('post_id')->nullable()->index('fk_event_participants_to_post');
            $table->foreignId('user_id')->nullable()->index('fk_event_participants_to_user');
            $table->enum('status', [0, 1, 2]);
            $table->date('join_date');
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
        Schema::dropIfExists('event_participants');
    }
}
