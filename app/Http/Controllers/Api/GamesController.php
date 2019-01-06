<?php
/**
 * Created by PhpStorm.
 * User: webfacer
 * Date: 25.03.2018
 * Time: 18:17
 */

namespace App\Http\Controllers\Api;


use App\Model\Dto\Game\GameCreateCommand;
use App\Model\Dto\Game\GameDeleteCommand;
use App\Model\Dto\Game\GameUpdateCommand;
use App\Http\Controllers\Repositories\GameRepository;

/**
 * Class GamesController
 * @package App\Http\Controllers\Api
 *
 * @Before("csrf", on={"post", "put", "delete"})
 */
class GamesController extends AbstractBasicController
{
    public function __construct()
    {
        $this->repository = new GameRepository();
        $this->createCommand = new GameCreateCommand();
        $this->updateCommand = new GameUpdateCommand();
        $this->deleteCommand = new GameDeleteCommand();
    }
}
