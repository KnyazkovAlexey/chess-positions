<?php declare(strict_types=1);

namespace Framework;

abstract class Dto
{
    public function __construct(array $params = [])
    {
        foreach ($params as $key => $value) {
            if (has_public_property(static::class, $key)) {
                $this->$key = $value;
            }
        }
    }
}