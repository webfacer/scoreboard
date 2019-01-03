<?php
/**
 * Created by PhpStorm.
 * User: Davor Ilic
 * Date: 10.06.2018
 * Time: 02:57
 */
namespace App\Model\Dto;



use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;

class GameCreateCommand extends Model
{
    /**
     * @var Request $request
     */
    protected $request;

    /**
     * @var array $fillable
     */
    protected $fillable = [
        'request',
    ];


    public function __construct()
    {
    }

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
     * @return Request
     */
    public function getRequest(): Request
    {
        return $this->request;
    }

    /**
     * @param Request $request
     */
    public function setRequest(Request $request)
    {
        $this->request = $request;
    }
}
