<?php

$database="crud";
$user='root';
$password="";

try {

    $con= new PDO('mysql:host=localhost;dbname='.$database,$user,$password);

}catch(PDOEXception $e){

    echo "Error: ".->getMessage();

}



?>