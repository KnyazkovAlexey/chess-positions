<?php declare(strict_types=1);

namespace Framework;

abstract class View
{
    abstract public function render(array $params = []): string;
}