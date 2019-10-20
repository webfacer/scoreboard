<?php
/**
 * Created by PhpStorm.
 * User: webfacer
 * Date: 12.05.2018
 * Time: 01:42
 */

namespace App\Http\Controllers\Repositories;

use App\Model\Location;
use Illuminate\Http\JsonResponse;
use App\Model\Dto\Location\LocationDeleteCommand;
use App\Model\Dto\Location\LocationCreateCommand;
use App\Model\Dto\Location\LocationUpdateCommand;
use Illuminate\Database\Eloquent\Model;

/**
 * Class GameRepository
 * @package App\Http\Controllers\Repositories
 */
class LocationRepository extends Repository
{
    protected $model;


    /**
     * CoinsController constructor.
     * Initialize the Model
     * @throws \Exception
     */
    public function __construct()
    {
        parent::__construct(new Location());
    }

    public function read(\Closure $closure): JsonResponse
    {
        return parent::read(function ($model) {
            return $model::with(['beers', 'deliveryServices']);
        });
    }

    /**
     * @param LocationCreateCommand $locationCreateCommand
     *
     * @return JsonResponse
     */
    public function commandCreate(LocationCreateCommand $locationCreateCommand)
    {
        return parent::save(function(Model $model) use ($locationCreateCommand) {
            return $model->fill($locationCreateCommand->getAttributes());
        });
    }

    /**
     * @param LocationUpdateCommand $locationUpdateCommand
     *
     * @return JsonResponse
     */
    public function commandUpdate(LocationUpdateCommand $locationUpdateCommand)
    {
        return parent::update(function (Model $model) use ($locationUpdateCommand) {

            $model = $model::find( $locationUpdateCommand->getAttribute('id') );

            if ($model instanceof Model) {
                $model->fill($locationUpdateCommand->getAttributes());
            }

            return $model;
        });
    }

    /**
     * Delete Action
     *
     * @param LocationDeleteCommand $locationDeleteCommand
     *
     * @return JsonResponse
     */
    public function commandDelete(LocationDeleteCommand $locationDeleteCommand)
    {
        return parent::delete(function (Model $model) use ($locationDeleteCommand) {
            return $model::where('id', $locationDeleteCommand->getAttribute('id'));
        });
    }
}
