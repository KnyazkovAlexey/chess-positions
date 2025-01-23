<?php declare(strict_types=1);

namespace Framework;

abstract class Validator
{
    abstract public function validate(array $params = []): bool;
}