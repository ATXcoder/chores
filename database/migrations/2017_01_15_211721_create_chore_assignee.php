<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateChoreAssignee extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_chores', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->integer('chore_id');
            $table->foreign('chore_id')->references('id')->on('chores');
            $table->boolean('complete');
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
        Schema::dropIfExists('chore_assignee');
    }
}
