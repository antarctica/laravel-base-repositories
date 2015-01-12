<?php

namespace Antarctica\LaravelBaseRepositories\Repository;

abstract class BaseRepositoryEloquent implements BaseRepositoryInterface {

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
     * @return array
     */
    public function all()
    {
        return $this->model->all()->toArray();
    }

    /**
     * Return a single record/entity specified by an $id
     *
     * @param string $id
     * @return array
     */
    public function find($id)
    {
        return $this->model->findOrFail($id)->toArray();
    }

    /**
     * Create new record/entity from $input
     *
     * @param array $input
     * @return array
     */
    public function create(Array $input)
    {
        return $this->model->create($input);
    }

    /**
     * Delete record/entity specified by an $id
     *
     * @param $id
     * @return bool
     * @throws \Exception
     */
    public function delete($id)
    {
        $this->model->find($id)->delete();

        return true;
    }
}