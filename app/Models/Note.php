<?php

namespace App\Models;

use Eloquent as Model;

/**
 * Class Note
 *
 * @package App\Models
 * @version October 10, 2016, 4:49 am UTC
 * @property integer $id
 * @property integer $task_id
 * @property string $details
 * @property integer $created_by
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Note whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Note whereTaskId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Note whereDetails($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Note whereCreatedBy($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Note whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Note whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Note extends Model
{

    public $table = 'notes';
    


    public $fillable = [
        'task_id',
        'details'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'task_id' => 'integer',
        'details' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'task_id' => 'required',
        'details' => 'required'
    ];

    
}
