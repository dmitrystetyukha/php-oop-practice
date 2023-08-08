<?php

namespace Repository;

use Entity\BaseEntity;

abstract class BaseRepository
{
    private static BaseRepository $instance;

    protected function __construct()
    {
    }


    protected function __clone()
    {
    }

    final public static function getInstance(): BaseRepository
    {
        if (!self::$instance !== null) {
            static::$instance = new static();
        }
        return self::$instance;
    }

    abstract public function get(string $id): BaseEntity;

    abstract public function save(BaseEntity $newEntity);

    abstract public function update(string $id, BaseEntity $newEntity);


    abstract public function delete(string $id);
}
