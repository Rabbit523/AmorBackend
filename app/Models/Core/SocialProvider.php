<?php

namespace App\Models\Core;

use Illuminate\Database\Eloquent\Model;

class SocialProvider extends Model
{
        /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'social_provider';

    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'id';

    /**
     * @var array
     */

    protected $fillable = ['user_id', 'provider_id', 'provider'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
}