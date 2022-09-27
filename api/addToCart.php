<?php

session_start();

if (isset($_SESSION['carrito'])) {

    if (isset($_SESSION['carrito'])) {

        $carrito = $_SESSION['carrito'];

        if (isset($_POST['nombre'])) {

            $id = $_POST['id'];
            $nombre = $_POST['nombre'];
            $descripcion = $_POST['descripcion'];
            $precio = $_POST['precio'];
            $cantidad = $_POST['cantidad'];
            $pos = -1;
            $stock = $_POST['stock'];

            if ($stock > 1) {

                if ($cantidad <= $stock && $cantidad > 0) {


                    if ($pos != -1) {

                        $total = $carrito[$pos]['cantidad'] + $cantidad;

                        $carrito[$pos] = array('id' => $id, 'nombre' => $nombre, 'descripcion' => $descripcion, 'precio' => $precio, 'cantidad' => $cantidad);

                        $_SESSION['carrito'] = $carrito;

                        echo json_encode(['success' => '202']);
                        return;
                    } else {


                        $boolean = false;

                        foreach ($_SESSION['carrito'] as $key => $valor) {

                            if ($id === $valor['id']) {

                                $totalCantidad = $valor['cantidad'] + 1;

                                $_SESSION['carrito'][$key] = array('id' => $id, 'nombre' => $nombre, 'descripcion' => $descripcion, 'precio' => $precio, 'cantidad' => $totalCantidad);

                                echo json_encode(['success' => '202']);
                                return;
                            } else {
                                $boolean = false;
                            }
                        }

                        if ($boolean === false) {

                            $carrito[] = array('id' => $id, 'nombre' => $nombre, 'descripcion' => $descripcion, 'precio' => $precio, 'cantidad' => $cantidad);

                            $_SESSION['carrito'] = $carrito;

                            echo json_encode(['success' => '202']);
                            return;
                        }
                    }
                } else {
                    echo json_encode(['error' => '403', 'msg' => 'La cantidad introducida no está disponible!']);
                    return;
                }
            } else {
                echo json_encode(['error' => '403', 'msg' => 'Lo sentimos, no tenemos stock en estos momentos!']);
                return;
            }
        }
    }
} else {


    if (isset($_POST['id']) && isset($_POST['nombre'])) { //Pasa por aquí si no existe la sesion del carrito
        $carrito = [];

        $id = $_POST['id'];
        $nombre = $_POST['nombre'];
        $descripcion = $_POST['descripcion'];
        $precio = $_POST['precio'];
        $cantidad = $_POST['cantidad'];
        $stock = $_POST['stock'];

        if ($stock > 1) {

            if ($cantidad <= $stock && $cantidad > 0) {

                $carrito[] = array('id' => $id, 'nombre' => $nombre, 'descripcion' => $descripcion, 'precio' => $precio, 'cantidad' => $cantidad);

                $_SESSION['carrito'] = $carrito;

                echo json_encode(['success' => '202']);
                return;
            } else {
                echo json_encode(['error' => '403', 'msg' => 'La cantidad introducida no está disponible!']);
                return;
            }
        } else {
            echo json_encode(['error' => '403', 'msg' => 'Lo sentimos, no tenemos stock en estos momentos!']);
            return;
        }
    }
}
?>