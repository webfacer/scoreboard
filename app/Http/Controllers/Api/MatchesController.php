<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
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
    }

    /**
     * @param Request $request
     *
     * @return object
     */
    public function create(Request $request)
    {
        return $this->repository->save(function ($model) use ($request) {
            return $model->fill($request->all());
        });
    }

    /**
     * @param Request $request
     * @param int $id
     *
     * @return object
     */
    public function updateAction(Request $request, int $id)
    {
        return $this->update(function ($model) use ($request, $id) {
            $model = $model::find($id);
            $model->fill($request->all());

            return $model;
        });
    }

    public function deleteAction(Request $request, int $id)
    {
        return $this->delete($id, function ($model) use ($request, $id) {
            return $model::find($id);
        });
    }
}
