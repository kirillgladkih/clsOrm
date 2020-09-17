<?php


namespace Core\Collection;


use Core\Model\IModel;

interface IModelCollection
{
    /*
     * create in Collection
      * @param IModel $model, String $class
     * */
    static function create($class, IModel $model);

    /*
     * get item in collection
     * @param String $hash, String $class
     * @return Array | bool
     * */
    static function find($class, $hash);

    /*
    * remove item in collection
    * @param String $hash, String $class
    * bool
    * */
    static function remove($class, $hash);

    /*
    * update item in collection
    * @param String $hash, IModel $model, String $class
    * @return Array | bool
    * */
    static function update($class, $hash, IModel $model);

    /*
    * get All item in collection, String $class
    * @return Array | bool
    * */
    static function all($class);

    /*
     * get Hash array
     * @return Array
     * */
    static function getHashArray();
}