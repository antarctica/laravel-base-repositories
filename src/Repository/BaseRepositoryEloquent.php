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
     * Return all entity
     *
     * @return mixed
     */
    public function all()
    {
        return $this->model->all();
    }

    /**
     * Create new entity from $input
     *
     * @param array $input
     * @return mixed
     */
    public function create(Array $input)
    {
        return $this->model->create($input);
    }
}