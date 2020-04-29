<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->unsignedBigInteger('role_id');
            $table->foreign('role_id')
                ->references('id')
                ->on('roles');
            $table->unsignedBigInteger('city_id');
            $table->foreign('city_id')
                ->references('id')
                ->on('cities');
            $table->string('device_token');
            $table->string('description');
            $table->string('nickname');
            $table->double('rating_score');
            $table->string('image_path');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {

            $table->dropForeign(['city_id']);
            $table->dropForeign(['role_id']);
            $table->dropColumn('city_id');
            $table->dropColumn('role_id');
            $table->dropColumn('device_token');
            $table->dropColumn('description');
            $table->dropColumn('nickname');
            $table->dropColumn('rating_score');
            $table->dropColumn('image_path');
        });
    }
}
