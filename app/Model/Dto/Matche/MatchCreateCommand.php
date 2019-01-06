<?php
/**
 * Created by PhpStorm.
 * User: webfacer
 * Date: 19.06.2018
 * Time: 23:29
 */
namespace App\Model\Dto\Match;


use Illuminate\Database\Eloquent\Model;

/**
 * Class MatchCreateCommand
 * @package App\Model\Dto\Character
 */
class MatchCreateCommand extends Model
{
    /**
     * @var int $p1_id
     */
    protected $p1_id;

    /**
     * @var int $p2_id
     */
    protected $p2_id;

    /**
     * @var int $p1_score
     */
    protected $p1_score;

    /**
     * @var int $p2_score
     */
    protected $p2_score;

    /**
     * @var string $video_link
     */
    protected $video_link;

    /**
     * @var string $note
     */
    protected $note;


    /**
     * CharacterCreateCommand constructor.
     */
    public function __construct() {}

    /**
     * @return int
     */
    public function getP1Id(): int
    {
        return $this->p1_id;
    }

    /**
     * @param int $p1_id
     */
    public function setP1Id(int $p1_id)
    {
        $this->p1_id = $p1_id;
    }

    /**
     * @return int
     */
    public function getP2Id(): int
    {
        return $this->p2_id;
    }

    /**
     * @param int $p2_id
     */
    public function setP2Id(int $p2_id)
    {
        $this->p2_id = $p2_id;
    }

    /**
     * @return int
     */
    public function getP1Score(): int
    {
        return $this->p1_score;
    }

    /**
     * @param int $p1_score
     */
    public function setP1Score(int $p1_score)
    {
        $this->p1_score = $p1_score;
    }

    /**
     * @return int
     */
    public function getP2Score(): int
    {
        return $this->p2_score;
    }

    /**
     * @param int $p2_score
     */
    public function setP2Score(int $p2_score)
    {
        $this->p2_score = $p2_score;
    }

    /**
     * @return string
     */
    public function getVideoLink(): string
    {
        return $this->video_link;
    }

    /**
     * @param string $video_link
     */
    public function setVideoLink(string $video_link)
    {
        $this->video_link = $video_link;
    }

    /**
     * @return string
     */
    public function getNote(): string
    {
        return $this->note;
    }

    /**
     * @param string $note
     */
    public function setNote(string $note)
    {
        $this->note = $note;
    }
}
