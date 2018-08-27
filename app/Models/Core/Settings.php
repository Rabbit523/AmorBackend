<?php

namespace App\Models\Core;

use Illuminate\Database\Eloquent\Model;

class Settings extends Model
{
        /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'settings';

    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'id';

    /**
     * @var array
     */

    protected $fillable = ['cr_lang', 'df_lang', 'user_id'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
}