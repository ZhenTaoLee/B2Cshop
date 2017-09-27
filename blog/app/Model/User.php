<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    //一个模型对应给一张表，如果模型名是User 对应表名就是users
    protected $table = 'users';

    protected $primaryKey = 'id';
}
