<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MyUser extends Model
{
    //
    protected $table = 'myusers';
    protected $primaryKey = 'user_id';
}
