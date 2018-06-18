<?php
/**
 * Created by PhpStorm.
 * User: Davor Ilic
 * Date: 12.05.2018
 * Time: 01:42
 */

namespace App\Http\Controllers\Repositories;


use App\Model\Game;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Model\Dto\GameUpdateCommand;

class GameRepository extends Repository
{
    protected $model;

    /**
     * CoinsController constructor.
     * Initialize the Model
     */
    public function __construct()
    {
        parent::__construct(new Game());
    }

    /**
     * @param Request $request
     *
     * @return JsonResponse
     */
    public function commandCreate(Request $request)
    {
        return $this->save(function($model) use ($request) {
            return $model->fill([
                'name'      => $request->name,
                'initials'  => $request->initials
            ]);
        });
    }

    /**
     * @param GameUpdateCommand $gameUpdateCommand
     *
     * @return JsonResponse
     */
    public function commandUpdate(GameUpdateCommand $gameUpdateCommand)
    {
        return parent::update(function (Model $model) use ($gameUpdateCommand) {
            $request = $gameUpdateCommand->getAttribute('request');
            $model = $model::find( $gameUpdateCommand->getAttribute('id') );
            $model->fill([
                'name'      => $request->name,
                'initials'    => $request->initials
            ]);

            return $model;
        });
    }

    /**
     * Delete Action
     *
     * @param Request $request
     * @param int $id
     *
     * @return \Illuminate\Http\JsonResponse
     */
    /*public function delete(Request $request, int $id)
    {
        return parent::delete($id, function ($model) use ($request, $id) {
            return $model::find($id);
        });
    }*/
}
