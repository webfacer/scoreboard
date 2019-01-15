<?php
/**
 * Created by PhpStorm.
 * User: Davor Ilic
 * Date: 12.05.2018
 * Time: 01:42
 */

namespace App\Http\Controllers\Repositories;


use App\Model\Match;
use Illuminate\Http\JsonResponse;
use Illuminate\Database\Eloquent\Model;
use App\Model\Dto\Match\MatchCreateCommand;
use App\Model\Dto\Match\MatchUpdateCommand;
use App\Model\Dto\Match\MatchDeleteCommand;

/**
 * Class MatchesRepository
 * @package App\Http\Controllers\Repositories
 */
class MatchesRepository extends Repository
{
    /**
     * CoinsController constructor.
     * Initialize the Model
     */
    public function __construct()
    {
        parent::__construct(new Match());
    }

    /**
     * @param MatchCreateCommand $matchCreateCommand
     *
     * @return JsonResponse
     */
    public function commandCreate(MatchCreateCommand $matchCreateCommand)
    {
        return $this->save(function(Model $model) use ($matchCreateCommand) {
            return $model->fill($matchCreateCommand->getAttributes());
        });
    }

    /**
     * @param MatchUpdateCommand $matchUpdateCommand
     *
     * @return JsonResponse
     */
    public function commandUpdate(MatchUpdateCommand $matchUpdateCommand)
    {
        return parent::update(function (Model $model) use ($matchUpdateCommand) {
            $model = $model::find($matchUpdateCommand->getAttribute('id'));

            if ($model instanceof Model) {
                return $model->fill($matchUpdateCommand->getAttributes());
            }

            return $model;
        });
    }

    /**
     * @param MatchDeleteCommand $matchDeleteCommand
     *
     * @return JsonResponse
     */
    public function commandDelete(MatchDeleteCommand $matchDeleteCommand)
    {
        return parent::delete(function (Model $model) use ($matchDeleteCommand) {
            return $model::where('id', $matchDeleteCommand->getAttribute('id'));
        });
    }
}
