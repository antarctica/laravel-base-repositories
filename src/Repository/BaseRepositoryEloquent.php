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
     * @param string $id
     * @return array
     */
    public function find($id)
    {
        return $this->model->findOrFail($id)->toArray();
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