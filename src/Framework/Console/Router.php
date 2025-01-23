<?php declare(strict_types=1);

namespace Framework\Console;

class Router
{
    /**
     * @param Request $request
     * @return Command|null
     */
    public function getCommand(Request $request): ?Command
    {
        $actionName = $request->getParam('action');

        if (empty($actionName)) {
            return null;
        }

        foreach ($this->getCommandsNamespaces() as $namespace) {
            $commandClass = $namespace . kebab_to_camel_case($actionName) . 'Command';

            if (class_exists($commandClass)) {
                /** @var Command $command */
                $command = app($commandClass);

                return $command;
            }
        }

        return null;
    }

    /**
     * @return string[]
     */
    protected function getCommandsNamespaces(): array
    {
        //todo: config

        return [
            '\\Containers\\Positions\\Commands\\',
        ];
    }
}