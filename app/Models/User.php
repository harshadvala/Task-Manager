<?php

namespace App\Models;

use Eloquent as Model;

/**
 * Class User
 *
 * @package App\Models
 * @version October 10, 2016, 4:41 am UTC
 * @property integer $id
 * @property string $name
 * @property string $email
 * @property string $password
 * @property boolean $is_active
 * @property boolean $is_admin
 * @property string $remember_token
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property string $image
 * @method static \Illuminate\Database\Query\Builder|\App\Models\User whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\User whereName($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\User whereEmail($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\User wherePassword($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\User whereIsActive($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\User whereIsAdmin($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\User whereRememberToken($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\User whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\User whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\User whereImage($value)
 * @mixin \Eloquent
 */
class User extends Model
{

    public $table = 'users';

    public $fillable = [
        'name',
        'email',
        'image',
        'is_active',
        'is_admin',
        'password'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'name' => 'string',
        'email' => 'string',
        'image' => 'string',
        'is_active' => 'boolean',
        'is_admin' => 'boolean'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'required',
        'password' => 'required|min:5',
        'email' => 'required|email|unique:users'
    ];

    public function setIsActiveAttribute($value)
    {
        if (empty($value)) {
            $value = false;
        }
        $this->attributes['is_active'] = $value;
    }

    public function setIsAdminAttribute($value)
    {
        if (empty($value)) {
            $value = false;
        }
        $this->attributes['is_admin'] = $value;
    }


}
