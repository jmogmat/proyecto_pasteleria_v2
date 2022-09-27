<?php

session_start();

require_once(__DIR__ . '/../autoload.php');

use \functions\functions as func;
use \conectDB\conectDB as conect;

$tool = new func();

$tool->checkSession();

header('Content-type: application/json; charset=utf-8');

if (isset($_SESSION['carrito'])) {

    $db = new conect($_SESSION['rol']);

    $itemId = $_POST['itemId'];

    foreach ($_SESSION['carrito'] as $key => $value) {

        if ($value['id'] === $itemId) {

            if ($value['cantidad'] == 1) {

                unset($_SESSION['carrito'][$key]);

                $newArrayCart = [];

                foreach ($_SESSION['carrito'] as $key => $value) {

                    array_push($newArrayCart, $_SESSION['carrito'][$key]);
                }

                unset($_SESSION['carrito']);

                if (!isset($_SESSION['carrito'])) {

                    foreach ($newArrayCart as $item) {

                        $_SESSION['carrito'][] = $item;
                    
                    }
                    
                     echo json_encode(['success' => '202']);
                        return;
                }
            }

            if ($value['cantidad'] > '1') {

                $totalCantidad = $value['cantidad'] - 1;

                $_SESSION['carrito'][$key] = array('id' => $value['id'], 'nombre' => $value['nombre'], 'descripcion' => $value['descripcion'], 'precio' => $value['precio'], 'cantidad' => $totalCantidad);

                echo json_encode(['success' => '202']);
                return;
            }
        }
    }
}
?>

