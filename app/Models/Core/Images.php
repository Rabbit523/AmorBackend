<?php

namespace App\Models\Core;

use Illuminate\Database\Eloquent\Model;

class Images extends Model
{
        /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'images';

    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'id';

    /**
     * @var array
     */

    protected $fillable = ['user_id', 'url'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
}