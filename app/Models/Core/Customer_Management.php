<?php

namespace App\Models\Core;

use Illuminate\Database\Eloquent\Model;

class Customer_Management extends Model
{
        /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'customer_management';

    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'id';

    /**
     * @var array
     */

    protected $fillable = ['gender', 'region', 'user_name', 'email', 'phone', 'account', 'diamond', 'start_date', 'end_date'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
}