<?php


namespace Core\Model;


use Core\Collection\ModelCollection;
use Core\Container\ModelContainer;
use phpDocumentor\Reflection\Types\static_;
use ReflectionClass;

class Model implements IModel
{
    protected $hash = null;
    protected static $fills = null;

    function __construct()
    {
        if ($this->hash == null) {
            $this->hash = uniqid();
        }
    }

    public function __debugInfo()
    {
        $r = new ReflectionClass(static::class);

        return
            [
                "methods"    => $r->getMethods(),
                "fills"      => static::$fills,
                "properties" => ModelContainer::all($this->getHash())
            ];
    }

    final public static function getFills()
    {
        return static::$fills;
    }

    final function getHash()
    {
        return $this->hash;
    }

    // final function __set($name, $value)
    // {
    //     ModelContainer::set($this->hash, $name, $value);
    // }

    // final function __get($name)
    // {
    //     return ModelContainer::get($this->hash, $name);
    // }

    final static function all()
    {
        return ModelCollection::all(static::class);
    }

    final static function create($data)
    {
        if (empty(static::$fills)) {
            throw new \Exception('empty $fills');
        }

        $itemCollection = new static();

        foreach (static::$fills as $fill) {
            ModelContainer::set($itemCollection->hash, $fill, $data[$fill]);
        }

        return ModelCollection::create(static::class, $itemCollection);
    }

    final static function find($hash)
    {
        return ModelCollection::find(static::class, $hash);
    }

    final static function remove($hash)
    {
        return ModelCollection::remove(static::class, $hash);
    }

    final static function update($hash, $data)
    {
        if (empty(static::$fills)) {
            throw new \Exception('empty $fills');
        }

        $itemCollection = static::find($hash);

        foreach (static::$fills as $fill) {
            $itemCollection->$fill = $data[$fill];
        }

        return ModelCollection::update(static::class, $hash, $itemCollection);
    }
}