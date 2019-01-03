<?php
/**
 * Created by PhpStorm.
 * User: Davor Ilic
 * Date: 19.06.2018
 * Time: 23:29
 */
namespace App\Model\Dto\Character;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;

class CharacterCreateCommand extends Model
{
    protected $fillable = ['name', 'initials'];

    /**
     * @var string $name
     */
    protected $name;

    /**
     * @var string $initials
     */
    protected $initials;


    /**
     * CharacterCreateCommand constructor.
     */
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
}
