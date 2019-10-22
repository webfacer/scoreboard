<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Player extends Model
{
    /**
     * @var string $table
     */
    protected $table = 'players';

    /**
     * @var string $dateFormat
     */
    protected $dateFormat = 'U';

    /**
     * @var array $fillable
     */
    protected $fillable = [
        'team_name',
        'nickname',
        'country_code',
        'games'
    ];
}
