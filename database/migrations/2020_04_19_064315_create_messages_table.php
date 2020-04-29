<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMessagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('messages', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('chat_id');
            $table->foreign('chat_id')
                ->references('id')
                ->on('chats');
            $table->unsignedBigInteger('author_id');
            $table->foreign('author_id')
                ->references('id')
                ->on('users');
            $table->string('text')->nullable(true);
            $table->string('image_path')->nullable(true);
            $table->string('video_path')->nullable(true);
            $table->string('audio_path')->nullable(true);
            $table->string('doc_path')->nullable(true);
            $table->softDeletes();
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
        Schema::dropIfExists('messages');
    }
}
