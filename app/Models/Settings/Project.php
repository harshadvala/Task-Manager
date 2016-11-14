<?php

namespace App\Models\Settings;

use Eloquent as Model;

/**
 * Class Project
 *
 * @package App\Models
 * @version November 12, 2016, 5:50 am UTC
 * @property integer $id
 * @property string $name
 * @property string $color
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Settings\Project whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Settings\Project whereName($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Settings\Project whereColor($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Settings\Project whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Settings\Project whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Project extends Model
{

    public $table = 'projects';
    


    public $fillable = [
        'name',
        'color'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'name' => 'string',
        'color' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'required'
    ];

    
}
