<?php
/**
 * Created by PhpStorm.
 * User: webfacer
 * Date: 12.05.2018
 * Time: 01:42
 */

namespace App\Repositories;


use App\Model\Beer;
use Illuminate\Http\JsonResponse;
use Illuminate\Database\Eloquent\Model;
use App\Model\Dto\Beer\BeerCreateCommand;
use App\Model\Dto\Beer\BeerUpdateCommand;
use App\Model\Dto\Beer\BeerDeleteCommand;

/**
 * Class CharacterRepository
 * @package App\Http\Controllers\Repositories
 */
class BeerRepository extends Repository
{
    /**
     * CoinsController constructor.
     * Initialize the Model
     * @throws \Exception
     */
    public function __construct()
    {
        parent::__construct(new Beer());
    }

    public function read(\Closure $closure): JsonResponse
    {
        return parent::read(function ($model) {
            return $model::with('locations');
        });
    }

    /**
     * @param BeerCreateCommand $beerCreateCommand
     *
     * @return JsonResponse
     */
    public function commandCreate(BeerCreateCommand $beerCreateCommand)
    {
        return parent::save(function(Model $model) use ($beerCreateCommand) {
            return $model->fill($beerCreateCommand->getAttributes());
        });
    }

    /**
     * @param BeerUpdateCommand $beerUpdateCommand
     * @return JsonResponse
     */
    public function commandUpdate(BeerUpdateCommand $beerUpdateCommand)
    {
        return parent::update(function (Model $model) use ($beerUpdateCommand) {

            $model = $model::find($beerUpdateCommand->getAttribute('id'));

            if ($model instanceof Model) {
                return $model->fill($beerUpdateCommand->getAttributes());
            }

            return $model;
        });
    }

    /**
     * @param BeerDeleteCommand $beerDeleteCommand
     *
     * @return JsonResponse
     */
    public function commandDelete(BeerDeleteCommand $beerDeleteCommand)
    {
        return parent::delete(function (Model $model) use ($beerDeleteCommand) {
            return $model::where('id', $beerDeleteCommand->getAttribute('id'));
        });
    }
}
