<?php
/**
 * Created by PhpStorm.
 * User: webfacer
 * Date: 19.06.2018
 * Time: 23:35
 */

namespace App\Model\Dto\Character;

use Illuminate\Database\Eloquent\Model;

/**
 * Class CharacterDeleteCommand
 * @package App\Model\Dto\Character
 */
class CharacterDeleteCommand extends Model
{
    /**
     * @var int $id
     */
    protected $id;

    protected $fillable = ['id'];

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
}
