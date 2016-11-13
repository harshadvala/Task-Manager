<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTasksTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tasks', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->text('description');
            $table->integer('project_id', false, true)->nullable();
            $table->integer('status')->default(0)->nullable();
            $table->integer('urgent_level')->default(0)->nullable();
            $table->integer('important_level')->default(0)->nullable();
            $table->integer('created_by', false, true)->nullable();
            $table->integer('assign_to', false, true)->nullable();
            $table->timestamp('due_date')->nullable();
            $table->timestamps();
        });

        Schema::table('tasks', function (Blueprint $table) {

            $table->foreign('created_by')->references('id')->on('users')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->foreign('assign_to')->references('id')->on('users')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->foreign('project_id')->references('id')->on('projects')
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
        Schema::drop('tasks');
    }
}
