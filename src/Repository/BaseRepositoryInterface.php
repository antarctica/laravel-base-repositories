<?php

namespace Antarctica\LaravelBaseRepositories\Repository;

interface BaseRepositoryInterface {

    /**
     * Return all records/entities
     *
     * @return array
     */
    public function all();

    /**
     * Return a single record/entity specified by an $id
     *
     * @param string $id
     * @return array
     */
    public function find($id);

    /**
     * Create new record/entity from $input
     *
     * @param array $input
     * @return array
     */
    public function create(Array $input);

    /**
     * Delete record/entity specified by an $id
     *
     * @param string $id
     * @return bool
     */
    public function delete($id);
}