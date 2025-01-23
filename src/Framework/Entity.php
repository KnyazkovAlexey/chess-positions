<?php declare(strict_types=1);

namespace Framework;

abstract class Entity
{
    /**
     * @param string $name
     * @return mixed
     */
    public function __get(string $name): mixed
    {
        return $this->$name; //todo: only for DB-attributes
    }

    /**
     * @param string $name
     * @param mixed $value
     */
    public function __set(string $name, mixed $value): void
    {
        $this->$name = $value; //todo: only for DB-attributes
    }
}