<?php
ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);

require_once ("vendor/autoload.php");

function dd($data){
    echo "<pre>";
    var_dump($data);
    echo "<pre>";
//    die();
}

$model = new \Core\Model\Model();



//dd($model->create(['name' => 'name1']));
$model->create(['name' => 'name2']);
$model->create(['name' => 'name3']);
$model->create(['name' => 'name4']);


//dd(\Core\Collection\ModelCollection::all(get_class($model)));

$collection = $model->all();

$randModelHash = $collection[array_rand($collection)]->getHash();
$randModel     = $collection[$randModelHash];




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

