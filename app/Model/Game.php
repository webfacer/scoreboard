<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    /**
     * @var string $table
     */
    protected $table = 'games';

    /**
     * @var string $dateFormat
     */
    protected $dateFormat = 'Y-m-d H:i:s';

    /**
     * @var array $fillable
     */
    protected $fillable = [
        'id',
        'name',
        'initials',
        'type',
        'player_size',
    ];
}
