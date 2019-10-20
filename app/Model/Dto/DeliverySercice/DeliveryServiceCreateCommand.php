<?php
/**
 * Created by PhpStorm.
 * User: webfacer
 * Date: 19.06.2018
 * Time: 23:29
 */
namespace App\Model\Dto\DeliverySercice;


use App\Model\AbstractModel;
use App\Model\Dto\DeliverySercice\Traits\DeliveryServiceTrait;

/**
 * Class MatchCreateCommand
 * @package App\Model\Dto\Match
 */
class DeliveryServiceCreateCommand extends AbstractModel
{
    use DeliveryServiceTrait;
}
