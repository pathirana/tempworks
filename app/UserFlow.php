<?php

namespace App;
use Illuminate\Database\Eloquent\Model;

// You can use this model to connect with DB table

class UserFlow extends Model 
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'created_at', 'onboarding_percentage','count_applications','count_accepted_applications',
    ];
   
}
