<?php

namespace App\Http\Controllers\Api;


use App\Model\Dto\Match\MatchCreateCommand;
use App\Model\Dto\Match\MatchDeleteCommand;
use App\Model\Dto\Match\MatchUpdateCommand;
use App\Http\Controllers\Repositories\MatchesRepository;

/**
 * Class MatchesController
 * @package App\Http\Controllers\Api
 */
class MatchesController extends AbstractBasicController
{
    public function __construct()
    {
        $this->repository = new MatchesRepository();
        $this->createCommand = new MatchCreateCommand();
        $this->updateCommand = new MatchUpdateCommand();
        $this->deleteCommand = new MatchDeleteCommand();
    }
}
