<?php
/**
 * Created by PhpStorm.
 * User: Davor Ilic
 * Date: 03.06.2018
 * Time: 03:44
 */

namespace App\Http\Controllers\Repositories;


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
     * @return object
     */
    public function save(\Closure $closure)
    {
        return parent::save($closure);
    }

    /**
     * @param \Closure $closure
     *
     * @return object
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
