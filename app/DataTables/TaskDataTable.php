<?php namespace App\DataTables;


use App\Models\Task;
use App\Queries\Query;

class TaskDataTable implements Query
{
    public function get($filters = [])
    {
        $user = \Auth::user();
        if (!$user->is_admin) {
            $filters['assign_to'] = $user->id;
        }
        $query = Task::with(['assignTo', 'project']);
        foreach ($filters as $key => $value) {
            if (!empty($value) || $value=='0') {
                $query = $query->where($key, $value);
            }
        }
        return $query->get();
    }
}