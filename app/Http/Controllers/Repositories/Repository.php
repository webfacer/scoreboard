<?php
/**
 * Created by PhpStorm.
 * User: Davor Ilic
 * Date: 03.06.2018
 * Time: 03:44
 */

namespace App\Http\Controllers\Repositories;


use Illuminate\Http\JsonResponse;

/**
 * Class Repository
 * @package App\Http\Controllers\Repositories
 */
class Repository extends AbstractRepository
{
    protected $model;

    /**
     * @param \Closure $closure
     *
     * @return JsonResponse
     */
    public function save(\Closure $closure)
    {
        return parent::save($closure);
    }

    /**
     * @param \Closure $closure
     *
     * @return JsonResponse
     */
    public function update(\Closure $closure)
    {
        return parent::update($closure);
    }

    /**
     * @param \Closure $closure
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function delete(\Closure $closure)
    {
        return parent::delete($closure);
    }
}
