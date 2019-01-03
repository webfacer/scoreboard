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
     * CoinsController constructor.
     * Initialize the Repository
     */
    public function __construct()
    {
        $this->repository = new CharacterRepository();
    }

    /**
     * @return mixed
     */
    public function read()
    {
        return $this->repository->read();
    }

    /**
     * Create Method
     *
     * @param Request $request
     *
     * @return \Illuminate\Http\JsonResponse|object
     */
    public function create(Request $request)
    {
        $characterCreateCommand = new CharacterCreateCommand();
        $characterCreateCommand->fill([
            'name'   => $request->get('name'),
            'initials' => $request->get('initials'),
        ]);

        return $this->repository->commandCreate($characterCreateCommand);
    }


    /**
     * @param Request $request
     * @param int $id
     *
     * @return object
     */
    public function update(Request $request, int $id)
    {
        $characterUpdateCommand = new CharacterUpdateCommand();
        $characterUpdateCommand->fill([
            'id' => $id,
            'name' => $request->get('name'),
            'initials' => $request->get('initials'),
        ]);

        return $this->repository->commandUpdate($characterUpdateCommand);
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


    /**
     * Delete Action
     *
     * @param Request $request
     * @param int $id
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function delete(Request $request, int $id)
    {
        $characterDeleteCommand = new CharacterDeleteCommand();
        $characterDeleteCommand->fill(['id' => $id]);

        return $this->repository->commandDelete($characterDeleteCommand);
    }
}
