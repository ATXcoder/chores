<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class User_Chores extends Model
{
    //
    protected $table = 'user_chores';

    protected $fillable = [
        'user_id','chore_id','complete','due_date'
    ];
}
