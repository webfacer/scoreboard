<?php
/**
 * Created by PhpStorm.
 * User: webfacer
 * Date: 19.06.2018
 * Time: 23:38
 */

namespace App\Model\Dto\Beer;

use App\Model\AbstractModel;
use App\Model\Dto\Beer\Traits\BeerTrait;

/**
 * Class CharacterUpdateCommand
 * @package App\Model\Dto\Character
 */
class BeerUpdateCommand extends AbstractModel
{
    use BeerTrait;
}
