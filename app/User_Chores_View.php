<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

class user_chores_view extends Model
{
    use Notifiable;

    protected $table="user_chores_view";
}
