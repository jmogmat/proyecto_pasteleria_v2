<?php

require_once(__DIR__ . '/../autoload.php');

use \functions\functions as func;
use \conectDB\conectDB as conect;

$tool = new func();

$tool->checkSession();

header('Content-type: application/json; charset=utf-8');

if($_POST['token']){
    
    
    if($tool->verifyToken($_POST['token']) == "ok"){
        
         echo json_encode(['success' => '202']);
         return;
             
    }else {
         echo json_encode(['error' => '402', 'msg' => 'El código no es valido o ha caducado. Ponte en contacto con nostros.']);
         return;
    }
    
} else {
      echo json_encode(['error' => '402', 'msg' => 'No se ha podido procesar la solicitud']);
         return;
}




?>


