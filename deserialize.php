<?php
include './classes/DAO/DTOClient.php';
session_start();

if(isset($_SESSION['client'])){
$client = unserialize($_SESSION['client']);
var_dump($client);
}else{
    echo 'Aucun client connecté';
}


