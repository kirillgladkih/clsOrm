<?php

namespace Test\Core\Model;

/**
 * Class TestModel
 * @property mixed name
 */
class User extends \Core\Model\Model
{
    protected $fills = [
        'name',
    ];
}