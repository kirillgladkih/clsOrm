<?php


namespace Core\Model;


interface IModel
{
    /*
    * create in Collection
     * @param Array $data
    * */
    function create($data);

    /*
     * get item in collection
     * @param String $hash
     * @return Array | bool
     * */
    function find($hash);

    /*
    * remove item in collection
    * @param String $hash
    * bool
    * */
    function remove($hash);

    /*
    * update item in collection
    * @param String $hash, Array $ata
    * @return Array | bool
    * */
    function update($hash, $data);

    /*
    * get All item in collection
    * @return Array | bool
    * */
    function all();

    /*
     * @return $this->hash
     * */
    function getHash();
}