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
 * Class GameDeleteCommand
 * @package App\Model\Dto
 */
class GameDeleteCommand extends Model
{

    /**
     * @var int $id
     */
    protected $id;

    /**
     * @var array $fillable
     */
    protected $fillable = ['id'];


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
}
