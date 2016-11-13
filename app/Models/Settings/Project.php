<?php

namespace App\Models\Settings;

use Eloquent as Model;

/**
 * Class Project
 * @package App\Models
 * @version November 12, 2016, 5:50 am UTC
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
