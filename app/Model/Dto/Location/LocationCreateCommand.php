<?php
/**
 * Created by PhpStorm.
 * User: webfacer
 * Date: 10.06.2018
 * Time: 02:57
 */
namespace App\Model\Dto\Location;

use App\Model\AbstractModel;
use App\Model\Dto\Location\Traits\LocationTrait;

/**
 * Class GameCreateCommand
 * @package App\Model\Dto
 */
class LocationCreateCommand extends AbstractModel
{
    use LocationTrait;
}
