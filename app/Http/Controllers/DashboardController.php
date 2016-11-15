<?php

namespace App\Http\Controllers;

use App\Models\Settings\Project;
use App\Models\Task;
use Auth;
use Carbon\Carbon;

class DashboardController extends AppBaseController
{
    public function index()
    {
        $user = Auth::user();

        $query = Task::whereStatus(0)->where('due_date', '>', Carbon::now());
        if (!$user->is_admin) {
            $query = $query->whereAssignTo($user->id);
        }
        $active = $query->count();

        $query = Task::whereStatus(1);
        if (!$user->is_admin) {
            $query = $query->whereAssignTo($user->id);
        }
        $completed = $query->count();

        $query = Task::whereStatus(0)->where('due_date', '<', Carbon::now());
        if (!$user->is_admin) {
            $query = $query->whereAssignTo($user->id);
        }
        $overDue = $query->count();

        $projects = Project::count();

        return view('dashboard.index',
            ['active' => $active, 'completed' => $completed, 'overDue' => $overDue, 'projects' => $projects]);
    }
}
