<?php 
$db['db_host']="localhost";
$db['db_user']="root";
$db['db_pass']="";
$db['db_name']="cms";

foreach($db as $key => $value){     //$key je umjesto brojeva u arrayu i on uzima podatke iz arraya $db redom i koristi u loopu a $value je vrijednost od tog keya
    define(strtoupper($key), $value);
}

$connection = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
if(!$connection){
    echo "You failed to connect to database";
}
 













?>