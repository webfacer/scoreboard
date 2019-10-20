<?php
/**
 * Created by PhpStorm.
 * User: webfacer
 * Date: 19.06.2018
 * Time: 23:38
 */

namespace App\Model\Dto\DeliverySercice;

use App\Model\AbstractModel;
use App\Model\Dto\DeliverySercice\Traits\DeliveryServiceTrait;

/**
 * Class MatchUpdateCommand
 * @package App\Model\Dto\Character
 */
class DeliveryServiceUpdateCommand extends AbstractModel
{
    use DeliveryServiceTrait;
}
