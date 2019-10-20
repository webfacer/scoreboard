<?php
/**
 * Created by PhpStorm.
 * User: Davor Ilic
 * Date: 10.06.2018
 * Time: 02:57
 */
namespace App\Model\Dto\Location;



use App\Model\AbstractModel;
use App\Model\Dto\Location\Traits\LocationTrait;

/**
 * Class GameUpdateCommand
 * @package App\Model\Dto
 */
class LocationUpdateCommand extends AbstractModel
{
    use LocationTrait;
}
