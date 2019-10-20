<?php
/**
 * Created by PhpStorm.
 * User: Davor Ilic
 * Date: 12.05.2018
 * Time: 01:42
 */

namespace App\Repositories;


use App\Model\DeliveryService;
use Illuminate\Http\JsonResponse;
use Illuminate\Database\Eloquent\Model;
use App\Model\Dto\DeliverySercice\DeliveryServiceCreateCommand;
use App\Model\Dto\DeliverySercice\DeliveryServiceUpdateCommand;
use App\Model\Dto\DeliverySercice\DeliveryServiceDeleteCommand;

/**
 * Class MatchesRepository
 * @package App\Http\Controllers\Repositories
 */
class DeliveryServicesRepository extends Repository
{
    /**
     * CoinsController constructor.
     * Initialize the Model
     */
    public function __construct()
    {
        parent::__construct(new DeliveryService());
    }

    public function read(\Closure $closure): JsonResponse
    {
        return parent::read(function ($model) {
            return $model::with('locations');
        });
    }

    /**
     * @param DeliveryServiceCreateCommand $matchCreateCommand
     *
     * @return JsonResponse
     */
    public function commandCreate(DeliveryServiceCreateCommand $matchCreateCommand)
    {
        return $this->save(function(Model $model) use ($matchCreateCommand) {
            return $model->fill($matchCreateCommand->getAttributes());
        });
    }

    /**
     * @param DeliveryServiceUpdateCommand $matchUpdateCommand
     *
     * @return JsonResponse
     */
    public function commandUpdate(DeliveryServiceUpdateCommand $matchUpdateCommand)
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
     * @param DeliveryServiceDeleteCommand $matchDeleteCommand
     *
     * @return JsonResponse
     */
    public function commandDelete(DeliveryServiceDeleteCommand $matchDeleteCommand)
    {
        return parent::delete(function (Model $model) use ($matchDeleteCommand) {
            return $model::where('id', $matchDeleteCommand->getAttribute('id'));
        });
    }
}
