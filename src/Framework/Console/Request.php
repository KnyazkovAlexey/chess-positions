<?php declare(strict_types=1);

namespace Framework\Console;

class Request
{
    /**
     * @param string $name
     * @return mixed
     */
    public function getParam(string $name): mixed
    {
        foreach ($_SERVER['argv'] as $arg) {
            if (strpos($arg, "--{$name}=") === 0 || strpos($arg, "-{$name}") === 0) {
                return explode('=', $arg)[1];
            }
        }

        return null;
    }

    /**
     * @param string $name
     * @return int|null
     */
    public function getInt(string $name): ?int
    {
        $param = $this->getParam($name);

        return !empty($param) ? (int)$param : null;
    }

    /**
     * @return array
     */
    public function all(): array
    {
        $params = [];

        foreach ($_SERVER['argv'] as $arg) {
            if (strpos($arg, '-') === 0) {
                if (strpos($arg, '--') === 0) {
                    $parts = explode('=', $arg, 2);
                    $option = substr($parts[0], 2);
                    $value = count($parts) > 1 ? $parts[1] : true;
                } else {
                    $option = substr($arg, 1);
                    $value = true;
                }

                $params[$option] = $value;
            }
        }

        return $params;
    }
}