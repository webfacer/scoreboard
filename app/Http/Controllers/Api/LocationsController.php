<?php
/**
 * Created by PhpStorm.
 * User: webfacer
 * Date: 25.03.2018
 * Time: 18:17
 */

namespace App\Http\Controllers\Api;


use App\Model\Dto\Location\LocationCreateCommand;
use App\Model\Dto\Location\LocationDeleteCommand;
use App\Model\Dto\Location\LocationUpdateCommand;
use App\Http\Controllers\Repositories\LocationRepository;

/**
 * Class GamesController
 * @package App\Http\Controllers\Api
 *
 * @Before("csrf", on={"post", "put", "delete"})
 */
class LocationsController extends AbstractBasicController
{
    public function __construct()
    {
        $this->repository = new LocationRepository();
        $this->createCommand = new LocationCreateCommand();
        $this->updateCommand = new LocationUpdateCommand();
        $this->deleteCommand = new LocationDeleteCommand();
    }
}
