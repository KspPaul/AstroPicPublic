<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Following extends Model
{
    public $timestamps = false;
    protected $table = 'FollowingAll';
}
