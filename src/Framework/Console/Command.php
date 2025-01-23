<?php declare(strict_types=1);

namespace Framework\Console;

abstract class Command
{
    /**
     * @param Request $request
     */
    abstract public function run(Request $request): void;

    /**
     * @param string $message
     */
    protected function write(string $message): void
    {
        //todo: inject some writer

        echo $message . PHP_EOL;
    }
}