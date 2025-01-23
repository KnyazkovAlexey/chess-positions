<?php declare(strict_types=1);

namespace Framework\Console;

class Request
{
    public function getParam(string $name): mixed
    {
        foreach ($_SERVER['argv'] as $arg) {
            if (strpos($arg, "--{$name}=") === 0 || strpos($arg, "-{$name}") === 0) {
                return explode('=', $arg)[1];
            }
        }

        return null;
    }

    public function getInt(string $name): ?int
    {
        $param = $this->getParam($name);

        return !empty($param) ? (int)$param : null;
    }

    public function all(): array
    {
        $params = [];
        $currentOption = null;

        foreach ($_SERVER['argv'] as $arg) {
            if (strpos($arg, '-') === 0) {
                if (strpos($arg, '--') === 0) {
                    // Длинная опция
                    $parts = explode('=', $arg, 2);
                    $option = substr($parts[0], 2);
                    $value = count($parts) > 1 ? $parts[1] : true;
                } else {
                    // Короткая опция
                    $option = substr($arg, 1);
                    $value = true;
                }

                $params[$option] = $value;
                $currentOption = $option;
            } elseif ($currentOption !== null) {
                // Значение для предыдущей опции
                $params[$currentOption] = $arg;
                $currentOption = null;
            }
        }

        return $params;
    }
}