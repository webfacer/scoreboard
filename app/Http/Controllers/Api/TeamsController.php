<?php
/**
 * Created by PhpStorm.
 * User: Davor Ilic
 * Date: 15.01.2019
 * Time: 21:06
 */

namespace App\Http\Controllers\Api;


class TeamsController extends AbstractBasicController
{
    public function __construct()
    {
        $this->repository = new TeamRepository();
    }
}
