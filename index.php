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

