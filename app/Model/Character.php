<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Character extends Model
{
    protected $table = 'characters';

    protected $fillable = ['name', 'initials'];
}
