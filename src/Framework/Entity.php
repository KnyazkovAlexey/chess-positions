<?php declare(strict_types=1);

namespace Framework;

abstract class Entity
{
    public function __get($name)
    {
        return $this->$name; //todo: only for DB-attributes
    }

    public function __set($name, $value)
    {
        $this->$name = $value; //todo: only for DB-attributes
    }
}