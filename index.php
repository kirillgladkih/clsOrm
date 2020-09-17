<?php

use Core\Collection\ModelCollection;
use Core\Model\TestModel;
use Test\Core\Model\ExModel;

require_once("vendor/autoload.php");




ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);



\Core\Model\TestModel::create(['name' => 'name1']);
\Core\Model\TestModel::create(['name' => 'name2']);
\Core\Model\TestModel::create(['name' => 'name3']);
\Core\Model\TestModel::create(['name' => 'name4']);
\Core\Model\TestModel::create(['name' => 'name5']);

$hash = array_rand(ModelCollection::getHashArray());

// TestModel::remove(ModelCollection::getHashArray()[$hash]);

$test = new TestModel();
$test->name = 'hui';




dd(ModelCollection::getHashArray(), TestModel::all(), ModelCollection::$collection);

//$model = new \Core\Model\Model();
//
//
//
////dd($model->create(['name' => 'name1']));
//$model->create(['name' => 'name2']);
//$model->create(['name' => 'name3']);
//$model->create(['name' => 'name4']);
//
//
////dd(\Core\Collection\ModelCollection::all(get_class($model)));
//
//$collection = $model->all();
//
//$randModelHash = $collection[array_rand($collection)]->getHash();
//$randModel     = $collection[$randModelHash];
//
//$t = new \Core\Model\TestModel ();
//$t->all();


//
//foreach ($model->all() as $item){
//  dd($item->name);
//}
//
//dd($model);

//$model = new \Core\Model\Model();
//
//$model->create(['name' => 'name1']);
//$model->create(['name' => 'name2']);
//$model->create(['name' => 'name3']);
//
//$i = 0;
//global $h;
//foreach ($model->all() as $index => $item) {
//    $i++;
//    if($i == 2){
//        $h = $item->getHash();
//    }
//}
//
//$model->update($h, ['name' => 'name4']));
//
//dd($model->find($h)->name);

//foreach ($model->all() as $index => $item) {
//   dd($item->name);
//}