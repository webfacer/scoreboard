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

class MatchCreateCommand extends Model
{
    /**
     * @var Request
     */
    protected $request;


    /**
     * CharacterCreateCommand constructor.
     */
    public function __construct()
    {
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
