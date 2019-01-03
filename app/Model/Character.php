<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Character
 * @package App\Model
 */
class Character extends Model
{
    protected $table = 'characters';

    protected $fillable = ['name', 'initials'];
}
