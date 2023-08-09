<?php

namespace Repository;

use Entity\User\BaseUser;

abstract class BaseUserRepository
{
    private static BaseUserRepository $instance;

    protected function __construct()
    {
    }


    protected function __clone()
    {
    }

    final public static function getInstance(): BaseUserRepository
    {
        if (!self::$instance !== null) {
            static::$instance = new static();
        }
        return self::$instance;
    }

    abstract public function get(string $id): BaseUser;

    abstract public function save(BaseUser $newUser);

    abstract public function update(string $id, BaseUser $newUser);


    abstract public function delete(string $id);
}
