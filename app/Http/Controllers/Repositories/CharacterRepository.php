<?php
/**
 * Created by PhpStorm.
 * User: webfacer
 * Date: 12.05.2018
 * Time: 01:42
 */

namespace App\Http\Controllers\Repositories;


use App\Model\Character;
use Illuminate\Http\JsonResponse;
use Illuminate\Database\Eloquent\Model;
use App\Model\Dto\Character\CharacterCreateCommand;
use App\Model\Dto\Character\CharacterUpdateCommand;
use App\Model\Dto\Character\CharacterDeleteCommand;

/**
 * Class CharacterRepository
 * @package App\Http\Controllers\Repositories
 */
class CharacterRepository extends Repository
{
    protected $model;


    /**
     * CoinsController constructor.
     * Initialize the Model
     */
    public function __construct()
    {
        parent::__construct(new Character());
    }

    /**
     * @param CharacterCreateCommand $characterCreateCommand
     *
     * @return JsonResponse
     */
    public function commandCreate(CharacterCreateCommand $characterCreateCommand)
    {
        return parent::save(function(Model $model) use ($characterCreateCommand) {
            return $model->fill($characterCreateCommand->getAttributes());
        });
    }

    /**
     * @param CharacterUpdateCommand $characterUpdateCommand
     * @return JsonResponse
     */
    public function commandUpdate(CharacterUpdateCommand $characterUpdateCommand)
    {
        return parent::update(function (Model $model) use ($characterUpdateCommand) {

            $model = $model::find($characterUpdateCommand->getAttribute('id'));

            if ($model instanceof Model) {
                return $model->fill($characterUpdateCommand->getAttributes());
            }

            return $model;
        });
    }

    /**
     * @param CharacterDeleteCommand $characterDeleteCommand
     *
     * @return JsonResponse
     */
    public function commandDelete(CharacterDeleteCommand $characterDeleteCommand)
    {
        return parent::delete(function (Model $model) use ($characterDeleteCommand) {
            return $model::where('id', $characterDeleteCommand->getAttribute('id'));
        });
    }
}
