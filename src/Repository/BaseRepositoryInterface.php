<?php

namespace Antarctica\LaravelBaseRepositories\Repository;

interface BaseRepositoryInterface {

    /**
     * Return all records/entities
     *
     * @return mixed
     */
    public function all();

    /**
     * Create new record/entity from $input
     *
     * @param $input
     * @return mixed
     */
    public function create($input);
}