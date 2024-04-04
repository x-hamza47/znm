<?php
require_once '../vendor/autoload.php';
require_once "../admin/php/crud.php";

$faker = Faker\Factory::create();

$db = new Database();

for($i = 0; $i < 20; $i++) {
    $category_id = 'cid-' . str_pad(mt_rand(1, 999999), 6, '0', STR_PAD_LEFT);
    $name = $faker->company();
    $status = $faker->numberBetween(0, 1);
    $db->createCategory('categories',$category_id,$name,$status,'cid','name','status');
}
if($i == 20){
    echo "Data Inserted Successfully";
}



?>