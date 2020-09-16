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

    final function getHash()
    {
        return $this->hash;
    }

    final function __set($name, $value)
    {
        ModelContainer::set($this->hash, $name, $value);
    }

    final function __get($name)
    {
        return ModelContainer::get($this->hash, $name);
    }

    final function all()
    {
        return ModelCollection::all(get_class($this));
    }

    final function create($data)
    {
        $itemCollection = new self();

        foreach ($this->fills as $fill) {
            ModelContainer::set($itemCollection->hash, $fill, $data[$fill]);
        }

       return  ModelCollection::create(get_class($this), $itemCollection);

    }

    final function find($hash)
    {
        return ModelCollection::find(get_class($this), $hash);
    }

    final function remove($hash)
    {
        return ModelCollection::remove(get_class($this), $hash);
    }

    final function update($hash, $data)
    {
        $itemCollection = $this->find($hash);


        foreach ($this->fills as $fill) {
            $itemCollection->$fill = $data[$fill];
        }

        return ModelCollection::update(get_class($this), $hash, $itemCollection);
    }
}