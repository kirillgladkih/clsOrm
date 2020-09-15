<?php


namespace Core\Model;


use Core\Container\ModelContainer;

class Model implements IModel
{
    protected static $collection = [];
    protected $hash = null;
    protected $fills = ['name'];

    function __construct()
    {
        if($this->hash == null)
        {
            $this->hash = uniqid();
        }
    }

    function __set($name, $value)
    {
        ModelContainer::set($this->hash, $name, $value);
    }

    function __get($name)
    {
        return ModelContainer::get($this->hash, $name);
    }

    function getHash()
    {
        return $this->hash;
    }

    function all()
    {
        return self::$collection[get_class($this)];
    }

    function create($data)
    {
        $itemCollection = new self();

        foreach ($this->fills as $fill){
            ModelContainer::set($itemCollection->hash, $fill, $data[$fill]);
        }

        self::$collection[get_class($this)][] = $itemCollection;

        return true;
    }

    function find($hash)
    {
        $items = self::$collection[get_class($this)];

        foreach ($items as $index => $item){
            if($item->getHash() === $hash)
                return $item;
        }

        return false;
    }

    function remove($hash)
    {
        $items = self::$collection[get_class($this)];

        foreach ($items as $index => $item){
            if($item->getHash() === $hash){
                unset(self::$collection[get_class($this)][$index]);

                return true;
            }
        }

        return false;
    }

    function update($hash, $data)
    {
        $itemCollection = $this->find($hash);

        foreach ($this->fills as $fill){
            $itemCollection->$fill = $data[$fill];
        }

        self::$collection[get_class($this)][$hash] = $itemCollection;

        return true;
    }
}