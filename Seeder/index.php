<?php
require_once '../vendor/autoload.php';
require_once "../php/config.php";

$faker = Faker\Factory::create();

$db = new dataSend();

for($i = 0; $i < 10; $i++) {
    $name = $faker->name();
    $email = $faker->email();
    $message = $faker->text();

    $db->sendMessage('messages',$name,"",$email,$message);
}
if($i == 10){
    echo "Data Inserted Successfully";
}



?>