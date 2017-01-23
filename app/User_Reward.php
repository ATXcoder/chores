<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class User_Reward extends Model
{
    protected $table = "user_rewards";
    protected $guarded = ['id', 'created_at', 'updated_at'];
}
