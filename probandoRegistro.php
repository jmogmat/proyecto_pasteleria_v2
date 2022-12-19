<?php
require_once(__DIR__ . '/../autoload.php');

use \conectDB\conectDB as conect;


header('Content-type: application/json; charset=utf-8');


 $db = new conect($_SESSION['rol']);
 
 
 $db->registerUser($name, $surname, $email, $phone, $pass);



?>

