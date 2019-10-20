<?php
/**
 * Created by PhpStorm.
 * User: Davor Ilic
 * Date: 19.06.2018
 * Time: 23:29
 */
namespace App\Model\Dto\Beer;

use App\Model\AbstractModel;
use App\Model\Dto\Beer\Traits\BeerTrait;

class BeerCreateCommand extends AbstractModel
{
    use BeerTrait;
}
