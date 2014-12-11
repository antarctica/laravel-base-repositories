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
     * @param string $id
     * @return array
     */
    public function find($id);

    /**
     * Create new record/entity from $input
     *
     * @param array $input
     * @return mixed
     */
    public function create(Array $input);

    /**
     * @param string $id
     * @return mixed
     */
    public function delete($id);
}