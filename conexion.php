<?php

$database='crud';
$user='root';
$password='Sena2022';

try {

    $con= new PDO('mysql:host=localhost;dbname='.$database,$user,$password);

}catch(PDOEXception $e){

    echo "Error: ".$e->getMessage();

}



?>