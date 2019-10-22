<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Match extends Model
{
    /**
     * @var string $table
     */
    protected $table = 'matches';

    /**
     * @var array $fillable
     */
    protected $fillable = [
        'id',
        'score_type',
        'scoring',
        'type',
        'p1_id',
        'p2_id',
        'p1_score',
        'p2_score',
        'video_link',
        'note',
    ];
}
