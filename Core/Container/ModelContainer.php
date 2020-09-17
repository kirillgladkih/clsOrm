<?php


namespace Core\Container;


class ModelContainer implements IModelContainer
{
    private static $container = [];
    private function __construct()
    {
    }
    private function __clone()
    {
    }

    static function get($hash, $name)
    {
        return self::$container[$hash][$name];
    }

    static function set($hash, $name, $value)
    {
        self::$container[$hash][$name] = $value;
    }

    static function all($hash)
    {
        return static::$container[$hash];
    }
}