<?php declare(strict_types=1);

namespace Framework;

abstract class View
{
    /**
     * @param array $params
     * @return string
     */
    abstract public function render(array $params = []): string;
}