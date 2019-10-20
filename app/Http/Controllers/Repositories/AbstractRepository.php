<?php
/**
 * Created by PhpStorm.
 * User: webfacer
 * Date: 12.05.2018
 * Time: 01:21
 */

namespace App\Http\Controllers\Repositories;

use App\Model\Beer;
use Illuminate\Http\JsonResponse;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\ModelNotFoundException;

/**
 * Class AbstractRepository
 * @package App\Http\Controllers\Repositories
 */
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
        }
        /**
         * @todo change model to repository var name
         */
        if ($model) {
            $this->model = $model;
        }
    }

    /**
     * @param \Closure $closure
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function read(\Closure $closure): JsonResponse
    {
        $model = $closure($this->model);

        $data = null;
        if (isset($model)) {
            $data = $model->get();
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
            if ($model instanceof Model) {
                $model->save();
                $message = $this->successMessage($model);
            }
            else {
                $message = [
                    'message' => 'Model is null! No model to update!',
                    'success' => false,
                ];
            }
        } catch (ModelNotFoundException $e) {
            $message = [
                'message' => $e->getMessage(),
                'success' => false,
            ];
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
        $model = $this->save(function (Model $model) use ($closure) {
            return $closure($model);
        });

        $message = $this->successMessage($model);

        return response()->json($message);
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

    private function successMessage($model = null): array
    {
        $message['success'] = true;

        if (isset($model) && $model instanceof Model) {
            $message['content'] = $model;
        }
        return $message;
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
