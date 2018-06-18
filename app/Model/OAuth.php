<?php
/**
 * Created by PhpStorm.
 * User: Davor Ilic
 * Date: 12.03.2018
 * Time: 15:20
 */

namespace App\Model;


class OAuth
{
    protected $token;

    /**
     * @return mixed
     */
    public function getToken()
    {
        return $this->token;
    }

    /**
     * @param mixed $token
     */
    public function setToken($token)
    {
        $this->token = $token;
    }
}
