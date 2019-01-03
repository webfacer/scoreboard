<?php
/**
 * Created by PhpStorm.
 * User: webfacer
 * Date: 19.06.2018
 * Time: 23:38
 */

namespace App\Model\Dto\Character;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;

/**
 * Class CharacterUpdateCommand
 * @package App\Model\Dto\Character
 */
class CharacterUpdateCommand extends Model
{
    protected $fillable = ['id', 'name', 'initials'];

    /**
     * @var int $id
     */
    protected $id;

    /**
     * @var string $name
     */
    protected $name;

    /**
     * @var string $initials
     */
    protected $initials;


    /**
     * CharacterUpdateCommand constructor.
     */
    public function __construct() {}

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
    public function setId(int $id)
    {
        $this->id = $id;
    }

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
}
