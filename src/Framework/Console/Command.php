<?php declare(strict_types=1);

namespace Framework\Console;

abstract class Command
{
    abstract public function run(Request $request): void;

    protected function write(string $message): void
    {
        //todo: inject some writer

        echo $message . PHP_EOL;
    }
}