<?php
/**
 * Created by PhpStorm.
 * User: Davor Ilic
 * Date: 02.04.2018
 * Time: 16:41
 */

namespace App\Http\Controllers\Api;

use App\Model\Player;
use Illuminate\Http\Request;

/**
 * Class PlayersController
 * @package App\Http\Controllers\Api
 */
class PlayersController extends AbstractBasicController
{
    /**
     * PlayersController constructor.
     */
    public function __construct()
    {
        parent::__construct(new Player());
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
        return $this->resave(function ($model) use ($request) {
            $model->fill([
                'name'      => $request->name,
                #'image'      => $request->image,
                'initials'    => $request->initials,
            ]);

            return $model;
        });

        return response()->json($model);
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
