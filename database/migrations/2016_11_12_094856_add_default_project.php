<?php

use App\Models\Settings\Project;
use Illuminate\Database\Migrations\Migration;

class AddDefaultProject extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Project::create(['name' => 'Task Manager', 'color' => '#004080']);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Project::where('name', 'Task Manager')->delete();
    }
}
