<?php

namespace App\Http\Controllers\Api;


use App\Repositories\DeliveryServicesRepository;
use App\Model\Dto\DeliverySercice\DeliveryServiceCreateCommand;
use App\Model\Dto\DeliverySercice\DeliveryServiceDeleteCommand;
use App\Model\Dto\DeliverySercice\DeliveryServiceUpdateCommand;

/**
 * Class MatchesController
 * @package App\Http\Controllers\Api
 */
class DeliveryServicesController extends AbstractBasicController
{
    public function beforeInit()
    {
        $this->repository = new DeliveryServicesRepository();
        $this->createCommand = new DeliveryServiceCreateCommand();
        $this->updateCommand = new DeliveryServiceUpdateCommand();
        $this->deleteCommand = new DeliveryServiceDeleteCommand();
    }
}
