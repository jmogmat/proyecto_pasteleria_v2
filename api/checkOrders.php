<?php

require_once(__DIR__ . '/../autoload.php');

use \functions\functions as func;
use \conectDB\conectDB as conect;

$tool = new func();

$tool->checkSession();

header('Content-type: application/json; charset=utf-8');

if (($_SERVER["REQUEST_METHOD"] == "POST")) {

    if (isset($_POST['userId'])) {

        $userId = $_POST['userId'];
        $db = new conect($_SESSION['rol']);
        $orders = $db->getOrdersUser($userId);
        if (!empty($orders)) {
            echo json_encode(['error' => '402', 'msg' => 'Error']);
            return;
        } else {
            echo json_encode(['success' => '202']);
            return;
        }
    }
}
?>

