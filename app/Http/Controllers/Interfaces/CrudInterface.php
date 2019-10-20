<?php
/**
 * Created by PhpStorm.
 * User: webfacer
 * Date: 21.10.2017
 * Time: 08:36
 */

namespace App\Http\Controllers\Interfaces;


use Illuminate\Http\Request;

/**
 * Interface CrudInterface
 * @package App\Http\Controllers\Interfaces
 */
interface CrudInterface
{
    /**
     * @param Request $request
     *
     * @return object
     */
    public function create(Request $request);


    /**
     * @param array $whereClause
     *
     * @return object
     */
    public function get(array $whereClause);


    /**
     * @return object
     */
    public function read();


    /**
     * @param \Closure $closure
     *
     * @return object
     * @internal param int $id
     */
    public function update(\Closure $closure);


    /**
     * @param int $id
     * @param \Closure $closure
     *
     * @return object
     * @internal param int $id
     * @internal param \Closure $closure
     */
    public function delete(int $id, \Closure $closure);
}
