<?php


namespace Core\Container;


interface IModelContainer
{
    /*
     * get ModelContainer Item
     * @param sting $hash, string $name
     * @return Array
     * */
    static function get($hash, $name);

    /*
     * set in ModelContainer Items
     * @param sting $hash, string $name, mixed $value
     * @return bool
     * */
    static function set($hash, $name, $value);

    /*
     * get All ModelContainer Item
     * @return Array
     * */
    static function all($hash);
}