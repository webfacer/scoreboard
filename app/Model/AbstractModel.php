<?php


namespace App\Model;


use Illuminate\Database\Eloquent\Model;

class AbstractModel extends Model
{
    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = [];
}
