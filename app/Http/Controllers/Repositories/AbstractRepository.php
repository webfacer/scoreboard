<?php
/**
 * Created by PhpStorm.
 * User: Davor Ilic
 * Date: 12.05.2018
 * Time: 01:21
 */

namespace App\Http\Controllers\Repositories;

use Illuminate\Http\JsonResponse;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\ModelNotFoundException;

abstract class AbstractRepository
{
    /**
     * @var Model $model
     */
    protected $model;


    /**
     * AbstractBasicRepository constructor.
     *
     * @param Model|null $model
     * @throws \Exception
     */
    public function __construct(Model $model = null)
    {
        if (class_exists($this->model)) {
            throw new \Exception('Unknown Model: '. $this->model);
            exit();
        }
        /**
         * @todo change model to repository var name
         */
        if ($model) {
            $this->model = $model;
        }
    }

    /**
     * @param array $whereClause Should hold multi-dimensional array like
     * [[id => 1],[symbol => 'Tt']] or one-dimensional [id => 1]
     * @return \Illuminate\Http\JsonResponse
     */
    public function read(array $whereClause = []): JsonResponse
    {
        $data = null;
        $modelName = $this->model;
        foreach ($whereClause as $key => $value) {
            if (count($value) == 2) {
                $model = $modelName::where($key, $value[0], $value[1]);
            }
            else {
                foreach ($value as $kv => $vv) {
                    if (! isset($model)) {
                        $model = $modelName::where($kv, $vv[0], $vv[1]);
                    }
                    else {
                        $model->where($kv, $vv[0], $vv[1]);
                    }
                }
            }
        };

        if (isset($this->model)) {
            $data = $this->model->get();
        }

        return response()->json($data);
    }


    /**
     * Create a new flight instance.
     *
     * @param \Closure $closure
     *
     * @return JsonResponse
     */
    public function save(\Closure $closure)
    {
        $model = $closure($this->model);
        try {
            $model->save();
            $message = ['message' => 'success'];
        } catch (ModelNotFoundException $e) {
            $message = ['message' => ['failed' => $e->getMessage()]];
        }
        return response()->json($message);
    }


    /**
     * @param \Closure $closure
     *
     * @return JsonResponse
     * @internal param int $id
     */
    public function update(\Closure $closure)
    {
        return $this->save(function (Model $model) use ($closure) {
            return $closure($model);
        });
    }


    /**
     * @param \Closure $closure
     *
     * @return \Illuminate\Http\JsonResponse
     * @internal param int $id
     * @internal param \Closure $closure
     */
    public function delete(\Closure $closure)
    {
        try {
            $message = ['message' => 'success'];
            $model = $closure($this->model);
            $model->delete();
        } catch (ModelNotFoundException $e) {
            $message = ['message' => ['failed' => $e->getMessage()]];
        }

        return response()->json($message);
    }

    /**
     * @return Model
     */
    public function getModel(): Model
    {
        return $this->model;
    }

    /**
     * @param Model $model
     */
    public function setModel(Model $model)
    {
        $this->model = new $model;
    }
}
