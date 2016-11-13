<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateNotesTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('notes', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('task_id', false, true);
            $table->text('details');
            $table->integer('created_by', false, true)->nullable();
            $table->timestamps();
        });

        Schema::table('notes', function (Blueprint $table) {
            $table->foreign('task_id')->references('id')->on('tasks')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->foreign('created_by')->references('id')->on('users')
                ->onDelete('cascade')
                ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('notes');
    }
}
