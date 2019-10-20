<?php

namespace App\Http\Controllers\Api;


use App\Model\Dto\DeliverySercice\DeliveryServiceCreateCommand;
use App\Model\Dto\DeliverySercice\DeliveryServiceDeleteCommand;
use App\Model\Dto\DeliverySercice\DeliveryServiceUpdateCommand;
use App\Http\Controllers\Repositories\DeliveryServicesRepository;

/**
 * Class MatchesController
 * @package App\Http\Controllers\Api
 */
class DeliveryServicesController extends AbstractBasicController
{
    public function __construct()
    {
        $this->repository = new DeliveryServicesRepository();
        $this->createCommand = new DeliveryServiceCreateCommand();
        $this->updateCommand = new DeliveryServiceUpdateCommand();
        $this->deleteCommand = new DeliveryServiceDeleteCommand();
    }
}
