<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('event_participants');
        Schema::create('event_participants', function (Blueprint $table) {
            $table->unsignedBigInteger('event_id')->nullable(false);
            $table->unsignedBigInteger('participant_id')->nullable(false);

//            $table->primary(['event_id', 'participant_id']);

            $table->foreign('event_id')
                ->references('event_id')
                ->on('events')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->foreign('participant_id')
                ->references('user_id')
                ->on('users')
                ->onUpdate('cascade')
                ->onDelete('cascade');

            $table->index('participant_id');
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
};
