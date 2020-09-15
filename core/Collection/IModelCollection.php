<?php


namespace Core\Collection;


interface IModelCollection
{
    static function set($class, $hash, $data);

    static function get($class, $hash, $data);

    static function f($class, $hash, $data);
}