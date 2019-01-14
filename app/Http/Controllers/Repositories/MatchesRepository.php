<?php
/**
 * Created by PhpStorm.
 * User: Davor Ilic
 * Date: 12.05.2018
 * Time: 01:42
 */

namespace App\Http\Controllers\Repositories;


use App\Model\Match;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Database\Eloquent\Model;
use App\Model\Dto\Match\MatchCreateCommand;
use App\Model\Dto\Match\MatchUpdateCommand;
use App\Model\Dto\Match\MatchDeleteCommand;

/**
 * Class MatchesRepository
 * @package App\Http\Controllers\Repositories
 */
class MatchesRepository extends Repository
{
    protected $model;

    /**
     * CoinsController constructor.
     * Initialize the Model
     */
    public function __construct()
    {
        parent::__construct(new Match());
    }

    /**
     * @param MatchCreateCommand $characterCreateCommand
     *
     * @return JsonResponse
     */
    public function commandCreate(MatchCreateCommand $characterCreateCommand)
    {
        return $this->save(function($model) use ($characterCreateCommand) {
            return $model->fill(
                $characterCreateCommand->getAttribute('request')->all()
            );
        });
    }

    /**
     * @param MatchUpdateCommand $characterUpdateCommand
     *
     * @return JsonResponse
     */
    public function commandUpdate(MatchUpdateCommand $characterUpdateCommand)
    {
        return parent::update(function (Model $model) use ($characterUpdateCommand) {
            /** @var Request $request */
            $request = $characterUpdateCommand->getAttribute('request');
            $model = $model::find(
                $characterUpdateCommand->getAttribute('id')
            );

            $model->fill($request->all());

            return $model;
        });
    }

    /**
     * @param MatchDeleteCommand $characterDeleteCommand
     *
     * @return JsonResponse
     */
    public function commandDelete(MatchDeleteCommand $characterDeleteCommand)
    {
        return parent::delete(function ($model) use ($characterDeleteCommand) {
            return $model::find($characterDeleteCommand->getAttribute('id'));
        });
    }
}
