<?php


namespace Core\Collection;


use Core\Model\IModel;

class ModelCollection implements IModelCollection
{
    protected static $collection = [];
    protected static $hashKeys   = [];

    private function __construct()
    {
    }

    private function __clone()
    {
    }

    public static function all($class)
    {
        if(isset(self::$collection[$class]))
            return self::$collection[$class];

        return false;
    }

    public static function create($class, IModel $model)
    {
        if(!in_array($model->getHash(), self::$hashKeys)){
            return self::$collection[$class][$model->getHash()] = $model;
        }

        return false;
    }

    public static function find($class, $hash)
    {
        if(isset(self::$collection[$class][$hash]))
            return self::$collection[$class][$hash];

        return false;
    }

    public static function remove($class, $hash)
    {
        if(isset(self::$collection[$class][$hash]))
            return self::$collection[$class][$hash];

        return false;
    }

    public static function update($class, $hash, IModel $model)
    {
        if(isset(self::$collection[$class][$hash]))
            return self::$collection[$class][$hash] = $model;

        return false;
    }
}