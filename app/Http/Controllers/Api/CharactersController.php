<?php

namespace App\Http\Controllers\Api;

use App\Model\Character;
use Illuminate\Http\Request;

class CharactersController extends AbstractBasicController
{
    /**
     * CoinsController constructor.
     * Initialize the Model
     */
    public function __construct()
    {
        $this->model = new Character();
        parent::__construct();
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
        return $this->create($request);
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
            $model->fill([
                'name'      => $request->name,
                #'image'      => $request->image,
                'initials'    => $request->initials,
            ]);

            return $model;
        });
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
        // @todo validate herer
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
        // @todo validate herer
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
    public function deleteAction(Request $request, int $id)
    {
        return $this->delete($id, function ($model) use ($request, $id) {
            $model = $model::find($id);
            return $model;
        });
    }
}
