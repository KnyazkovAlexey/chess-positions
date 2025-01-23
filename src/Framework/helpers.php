<?php declare(strict_types=1);

if (!function_exists('app')) {
    /**
     * @param string $class
     * @param array $params
     * @return mixed
     */
    function app(string $class, array $params = []): mixed
    {
        return new $class(); //todo: DI
    }
}

if (!function_exists('kebab_to_camel_case')) {
    /**
     * @param string $string
     * @return string
     */
    function kebab_to_camel_case(string $string): string
    {
        return str_replace(' ', '', ucwords(str_replace('-', ' ', $string)));
    }
}

if (!function_exists('has_public_property')) {
    /**
     * @param string $className
     * @param string $propName
     * @return bool
     * @throws ReflectionException
     */
    function has_public_property(string $className, string $propName): bool
    {
        $reflectionClass = new ReflectionClass($className);

        foreach ($reflectionClass->getProperties(ReflectionProperty::IS_PUBLIC) as $property) {
            if ($property->getName() === $propName) {
                return true;
            }
        }

        return false;
    }
}