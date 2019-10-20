<?php

namespace App\Http\Controllers\Api;


use App\Repositories\BeerRepository;
use App\Model\Dto\Beer\BeerCreateCommand;
use App\Model\Dto\Beer\BeerDeleteCommand;
use App\Model\Dto\Beer\BeerUpdateCommand;

/**
 * Class CharactersController
 * @package App\Http\Controllers\Api
 */
class BeersController extends AbstractBasicController
{
    /**
     * Before Initialize
     * Initialize Character Repository
     */
    public function beforeInit()
    {
        $this->repository = new BeerRepository();
        $this->createCommand = new BeerCreateCommand();
        $this->deleteCommand = new BeerDeleteCommand();
        $this->updateCommand = new BeerUpdateCommand();
    }
}
