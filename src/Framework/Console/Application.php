<?php declare(strict_types=1);

namespace Framework\Console;

use LogicException;
use Throwable;

class Application
{
    public function run(): void
    {
        try {
            /** @var Request $request */
            $request = app(Request::class);

            /** @var Router $router */
            $router = app(Router::class);

            if (empty($command = $router->getCommand($request))) {
                throw new LogicException('Command not found');
            }

            $command->run($request);

            exit(0);
        } catch (Throwable $e) {
            echo $e; //todo: error handling

            exit(1);
        }
    }
}