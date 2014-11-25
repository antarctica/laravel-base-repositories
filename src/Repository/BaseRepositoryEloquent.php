<?php

namespace Antarctica\LaravelBaseRepositories\Repository;

abstract class BaseRepositoryEloquent {

    protected $model;

    /**
     * @param $model
     */
    function __construct($model)
    {
        $this->model = $model;
    }

    /**
     * @return mixed
     */
    public function all()
    {
        return $this->model->all();
    }
}