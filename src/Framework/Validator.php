<?php declare(strict_types=1);

namespace Framework;

abstract class Validator
{
    /**
     * @param array $params
     * @return bool
     */
    abstract public function validate(array $params = []): bool;
}