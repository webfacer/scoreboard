<?php
/**
 * Created by PhpStorm.
 * User: webfacer
 * Date: 19.06.2018
 * Time: 23:29
 */
namespace App\Model\Dto\Match;


use Illuminate\Database\Eloquent\Model;
use App\Model\Dto\Match\Traits\Properties\MatchTrait;

/**
 * Class MatchCreateCommand
 * @package App\Model\Dto\Match
 */
class MatchCreateCommand extends Model
{
    use MatchTrait;

    protected $fillable = [
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
