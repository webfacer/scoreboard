<?php
/**
 * Created by PhpStorm.
 * User: webfacer
 * Date: 12.05.2018
 * Time: 01:42
 */

namespace App\Http\Controllers\Repositories;

use App\Model\Game;
use Illuminate\Http\JsonResponse;
use App\Model\Dto\Game\GameDeleteCommand;
use App\Model\Dto\Game\GameCreateCommand;
use App\Model\Dto\Game\GameUpdateCommand;
use Illuminate\Database\Eloquent\Model;

/**
 * Class GameRepository
 * @package App\Http\Controllers\Repositories
 */
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
     * @param GameCreateCommand $gameCreateCommand
     *
     * @return JsonResponse
     */
    public function commandCreate(GameCreateCommand $gameCreateCommand)
    {
        return $this->save(function(Model $model) use ($gameCreateCommand) {
            return $model->fill($gameCreateCommand->getAttributes());
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

            $model = $model::find( $gameUpdateCommand->getAttribute('id') );

            if ($model instanceof Model) {
                $model->fill($gameUpdateCommand->getAttributes());
            }

            return $model;
        });
    }

    /**
     * Delete Action
     *
     * @param GameDeleteCommand $gameDeleteCommand
     *
     * @return JsonResponse
     */
    public function commandDelete(GameDeleteCommand $gameDeleteCommand)
    {
        return parent::delete(function (Model $model) use ($gameDeleteCommand) {
            return $model::where('id', $gameDeleteCommand->getAttribute('id'));
        });
    }
}
