<?php

namespace App\Models;

use App\Models\Settings\Project;
use Auth;
use Eloquent as Model;

/**
 * Class Task
 *
 * @package App\Models
 * @version September 26, 2016, 5:21 am UTC
 * @property integer $id
 * @property string $title
 * @property string $description
 * @property integer $status
 * @property integer $priority
 * @property integer $created_by
 * @property integer $owner_id
 * @property string $due_date
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Task whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Task whereTitle($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Task whereDescription($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Task whereStatus($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Task wherePriority($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Task whereCreatedBy($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Task whereOwnerId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Task whereDueDate($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Task whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Task whereUpdatedAt($value)
 * @mixin \Eloquent
 * @property integer $priority_level
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Task wherePriorityLevel($value)
 */
class Task extends Model
{

    public $table = 'tasks';


    public $fillable = [
        'title',
        'description',
        'due_date',
        'urgent_level',
        'important_level',
        'due_date',
        'status',
        'project_id',
        'created_by',
        'assign_to'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'title' => 'string',
        'description' => 'string',
        'status'=>'boolean'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'title' => 'required',
        'project_id' => 'required',
        'due_date' => 'required',
        'assign_to' => 'required',
    ];

    public static function boot()
    {
        parent::boot();

        static::saving(function ($post) {
            if (empty($post->created_by)) {
                $post->created_by = Auth::user()->id;
            }
        });
    }

    public function project()
    {
        return $this->belongsTo(Project::class, 'project_id');
    }

    public function assignTo()
    {
        return $this->belongsTo(User::class, 'assign_to');
    }
}
