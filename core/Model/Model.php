<?php


namespace Core\Model;


use Core\Collection\ModelCollection;
use Core\Container\ModelContainer;

class Model implements IModel
{
    protected $hash = null;
    protected $fills = ['name'];

    function __construct()
    {
        if ($this->hash == null) {
            $this->hash = uniqid();
        }
    }

    function getHash()
    {
        return $this->hash;
    }

    function __set($name, $value)
    {
        ModelContainer::set($this->hash, $name, $value);
    }

    function __get($name)
    {
        return ModelContainer::get($this->hash, $name);
    }

    function all()
    {
        return ModelCollection::all(get_class($this));
    }

    function create($data)
    {
        $itemCollection = new self();

        foreach ($this->fills as $fill) {
            ModelContainer::set($itemCollection->hash, $fill, $data[$fill]);
        }

        ModelCollection::create(get_class($this), $itemCollection);

        return true;
    }

    function find($hash)
    {
        return ModelCollection::find(get_class($this), $hash);
    }

    function remove($hash)
    {
        return ModelCollection::remove(get_class($this), $hash);
    }

    function update($hash, $data)
    {
        $itemCollection = $this->find($hash);


        foreach ($this->fills as $fill) {
            $itemCollection->$fill = $data[$fill];
        }

        return ModelCollection::update(get_class($this), $hash, $itemCollection);
    }
}