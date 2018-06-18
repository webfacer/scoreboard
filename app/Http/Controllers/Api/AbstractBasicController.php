<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\Model;
use App\Http\Controllers\Repositories\AbstractRepository;

abstract class AbstractBasicController extends Controller
{
    /**
     * @var Model $model
     */
    protected $model;

    /**
     * @var AbstractRepository
     */
    protected $repository;


    /**
     * AbstractBasicController constructor.
     * @throws \Exception
     */
    public function __construct()
    {
        if (class_exists($this->repository)) {
            throw new \Exception('Unknown Model: '. $this->model);
        }
    }
}
