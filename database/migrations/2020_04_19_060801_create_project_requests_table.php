<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProjectRequestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('project_requests', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id')->nullable(true);
            $table->foreign('user_id')
                ->references('id')
                ->on('users');
            $table->unsignedBigInteger('project_id');
            $table->foreign('project_id')
                ->references('id')
                ->on('projects');
            $table->boolean('is_accepted');
            $table->boolean('is_to_specific_user');
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
        Schema::dropIfExists('project_requests');
    }
}
