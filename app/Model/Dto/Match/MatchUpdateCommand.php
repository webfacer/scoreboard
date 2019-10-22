<?php
/**
 * Created by PhpStorm.
 * User: webfacer
 * Date: 19.06.2018
 * Time: 23:38
 */

namespace App\Model\Dto\Match;

use App\Model\Dto\Match\Traits\Properties\MatchTrait;
use Illuminate\Database\Eloquent\Model;

/**
 * Class MatchUpdateCommand
 * @package App\Model\Dto\Character
 */
class MatchUpdateCommand extends Model
{
    use MatchTrait;

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

    /**
     * @var int $id
     */
    protected $id;


    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId(int $id): void
    {
        $this->id = $id;
    }
}
