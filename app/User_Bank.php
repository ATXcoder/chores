<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class User_Bank extends Model
{
    protected $table = 'user_bank';
    protected $fillable = ["user_id", "tokens"];
}
