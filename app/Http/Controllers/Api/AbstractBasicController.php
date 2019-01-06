<?php

namespace App\Http\Controllers\Api;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\Model;
use App\Http\Controllers\Repositories\AbstractRepository;

abstract class AbstractBasicController extends Controller
{
    /**
     * @var Model
     */
    protected $createCommand;

    /**
     * @var Model
     */
    protected $updateCommand;

    /**
     * @var Model
     */
    protected $deleteCommand;

    /**
     * @var AbstractRepository
     */
    protected $repository;


    /**
     * AbstractBasicController constructor.
     * @throws \Exception
     */
    public function __construct()
    {
        $this->beforeInit();

        //@todo fix this checking if repository exists
        #if ($this->repository instanceof Repository) {
         #   throw new \Exception('Unknown Repository: '. $this->repository);
        #}
    }

    public function beforeInit() {}

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
        $createCommand = $this->createCommand;
        $createCommand->fill($request->all());

        return $this->repository->commandCreate($createCommand);
    }


    /**
     * @param Request $request
     * @param int $id
     *
     * @return object
     */
    public function update(Request $request, int $id)
    {
        $updateCommand = $this->updateCommand;
        $fill = $request->all();
        $fill['id'] = $id;
        $updateCommand->fill($fill);

        return $this->repository->commandUpdate($updateCommand);
    }


    /**
     * Delete Action
     *
     * @param Request $request
     * @param int $id
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function delete(int $id)
    {
        $deleteCommand = $this->deleteCommand;
        $deleteCommand->fill(['id' => $id]);

        return $this->repository->commandDelete($deleteCommand);
    }
}
