<?php
/**
 * Created by PhpStorm.
 * User: webfacer
 * Date: 10.06.2018
 * Time: 02:57
 */
namespace App\Model\Dto\Game;

use Illuminate\Database\Eloquent\Model;

/**
 * Class GameCreateCommand
 * @package App\Model\Dto
 */
class GameCreateCommand extends Model
{
    /**
     * @var array $fillable
     */
    protected $fillable = ['name', 'initials', 'type', 'player_size'];

    /**
     * @var string name
     */
    protected $name;

    /**
     * @var string $initials
     */
    protected $initials;

    /**
     * @var string type
     */
    protected $type;

    /**
     * @var int $player_size
     */
    protected $player_size;


    public function __construct() {}

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName(string $name)
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getInitials(): string
    {
        return $this->initials;
    }

    /**
     * @param string $initials
     */
    public function setInitials(string $initials)
    {
        $this->initials = $initials;
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
    public function setType(string $type)
    {
        $this->type = $type;
    }

    /**
     * @return int
     */
    public function getPlayerSize(): int
    {
        return $this->player_size;
    }

    /**
     * @param int $player_size
     */
    public function setPlayerSize(int $player_size)
    {
        $this->player_size = $player_size;
    }
}
