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
        Schema::create('events', function (Blueprint $table) {
            $table->id('event_id');
            $table->string('header', 512)->nullable(false);
            $table->mediumText('event_text')->nullable(false);
            $table->date('created_at')->nullable(false);
            $table->unsignedBigInteger('user_id'); // Добавьте столбец user_id
            $table->foreign('user_id')
                ->references('user_id')
                ->on('users')
                ->onUpdate('cascade')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('events', function (Blueprint $table) {
            $table->dropForeign('events_user_id_foreign');
        });

        Schema::dropIfExists('events');
    }
};
