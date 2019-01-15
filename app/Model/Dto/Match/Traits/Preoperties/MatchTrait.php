<?php
/**
 * Created by PhpStorm.
 * User: webfacer
 * Date: 15.01.2019
 * Time: 19:33
 */

namespace App\Model\Dto\Match\Traits\Properties;


trait MatchTrait
{
    /**
     * @var string $score_type
     */
    protected $score_type;

    /**
     * @var integer $scoring
     */
    protected $scoring;

    /**
     * @var string $type
     */
    protected $type;

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
     * @return string
     */
    public function getScoreType(): string
    {
        return $this->score_type;
    }

    /**
     * @param string $score_type
     */
    public function setScoreType(string $score_type): void
    {
        $this->score_type = $score_type;
    }

    /**
     * @return int
     */
    public function getScoring(): int
    {
        return $this->scoring;
    }

    /**
     * @param int $scoring
     */
    public function setScoring(int $scoring): void
    {
        $this->scoring = $scoring;
    }

    /**
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * @param string $type
     */
    public function setType(string $type): void
    {
        $this->type = $type;
    }

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
