<?php

namespace Test\Core;

/**
 * Class TestModel
 */
class User extends \Core\Model\Model
{
    protected $fills = [
        'name',
    ];
}