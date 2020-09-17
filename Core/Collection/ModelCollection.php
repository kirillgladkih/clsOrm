<?php


namespace Core\Collection;


use ReflectionClass;
use Core\Model\IModel;
use Exception;

use function PHPUnit\Framework\throwException;

class ModelCollection implements IModelCollection
{
    public static $collection = [];
    protected static $hashKeys = [];

    private function __construct()
    {
    }

    private function __clone()
    {
    }

    public static function all($class)
    {
        if (isset(static::$collection[$class]))
            return static::$collection[$class];

        return false;
    }

    public static function create($class, IModel $model)
    {
        if (!in_array($model->getHash(), static::$hashKeys)) {

            static::$collection[$class][$model->getHash()] = $model;
            static::$hashKeys[] = $model->getHash();

            return static::$collection[$class][$model->getHash()];
        }

        return false;
    }

    public static function find($class, $hash)
    {
        if (isset(static::$collection[$class][$hash]))
            return static::$collection[$class][$hash];

        return false;
    }

    public static function remove($class, $hash)
    {
        if (isset(static::$collection[$class][$hash])) {
            unset(static::$collection[$class][$hash]);

            $key = array_search($hash, static::$hashKeys);
            // Очистка значения хеша
            unset(static::$hashKeys[$key]);

            return true;
        }

        return false;
    }

    public static function update($class, $hash, IModel $model)
    {
        if (isset(static::$collection[$class][$hash])) {
            static::$collection[$class][$hash] = $model;

            return static::$collection[$class][$hash];
        }

        return false;
    }

    public static function getHashArray()
    {
        return static::$hashKeys;
    }
}