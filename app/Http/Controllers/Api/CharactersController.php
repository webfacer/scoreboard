<?php

namespace App\Http\Controllers\Api;


use Illuminate\Http\Request;
use App\Model\Dto\Character\CharacterCreateCommand;
use App\Model\Dto\Character\CharacterDeleteCommand;
use App\Model\Dto\Character\CharacterUpdateCommand;
use App\Http\Controllers\Repositories\CharacterRepository;

/**
 * Class CharactersController
 * @package App\Http\Controllers\Api
 */
class CharactersController extends AbstractBasicController
{
    /**
     * Before Initialize
     * Initialize Character Repository
     */
    public function beforeInit()
    {
        $this->repository = new CharacterRepository();
        $this->createCommand = new CharacterCreateCommand();
        $this->deleteCommand = new CharacterDeleteCommand();
        $this->updateCommand = new CharacterUpdateCommand();
    }


    /**
     * Filter by Id
     *
     * @param Request $request
     * 
     * @return \Illuminate\Http\JsonResponse
     */
    public function filterById(Request $request)
    {
        // @todo validate this
        $wClause = ['id' => ['=', intval($request->id)]];
        return $this->get($wClause);
    }


    /**
     * Filter by Symbol
     *
     * @param Request $request
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function filterByInitials(Request $request)
    {
        // @todo validate this
        $wClause = ['initials' => ['like', '%'.(string) $request->symbol.'%']];
        return $this->get($wClause);
    }
}
