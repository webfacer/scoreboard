<?php
/**
 * Created by PhpStorm.
 * User: Davor Ilic
 * Date: 12.05.2018
 * Time: 01:42
 */

namespace App\Http\Controllers\Repositories;


use App\Model\Game;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Model\Dto\GameCreateCommand;
use App\Model\Dto\GameUpdateCommand;
use Illuminate\Database\Eloquent\Model;

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
     * @param GameCreateCommand $
     *
     * @return JsonResponse
     */
    public function commandCreate(GameCreateCommand $gameCreateCommand)
    {
        return $this->save(function($model) use ($gameCreateCommand) {
            return $model->fill(
                $gameCreateCommand->getAttribute('request')->all()
            );
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
            /** @var Request $request */
            $request = $gameUpdateCommand->getAttribute('request');
            $model = $model::find( $gameUpdateCommand->getAttribute('id') );
            $model->fill($request->all());

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
