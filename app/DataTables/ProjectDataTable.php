<?php
/**
 * Author: Harshad Vala
 * Email: harshadb.vala@gmail.com
 * Date: 11/13/2016
 * Time: 9:51 AM
 */

namespace App\DataTables;


use App\Models\Settings\Project;
use App\Queries\Query;

class ProjectDataTable implements Query
{

    public function get()
    {
        return Project::get(['id', 'name', 'color']);

    }
}