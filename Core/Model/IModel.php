<?php


namespace Core\Model;


interface IModel
{
    /*
     * Возвращает $this->hash
     * @return String
     * */
    function getHash();

    /*
     * Удаление модели из пула объектов
     * @param String $hash
     * return bool
     * */
    static function remove($hash);

    /*
     * Создание объекта в пуле \Core\Collection\ModelCollection
     * @param Array data
     * @return object implements \Core\Model\IModel | false
     * */
    static function create($data);

    /*
     * Обновление итема в пуле объектов \Core\Collection\ModelCollection
     * @param String $hash, Array data
     * @return object implements \Core\Model\IModel | false
     * */
    static function update($hash, $data);

    /*
    * Поиск итема в пуле объектов \Core\Collection\ModelCollection
    * @param String $hash
    * @return object implements \Core\Model\IModel | false
    * */
    static function find($hash);

    /*
    * Пулл объктов определенного класса внутри \Core\Collection\ModelCollection
    * @return Array | false
    * */
    static function all();
}