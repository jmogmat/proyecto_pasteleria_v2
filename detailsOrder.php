<?php
require_once(__DIR__ . './autoload.php');

use \functions\functions as func;
use \conectDB\conectDB as conect;

$tool = new func();

$tool->checkSession();

$user = json_decode($_SESSION['usuario']);

$user_id = json_decode($_SESSION['usuario'])->id;

if (isset($_GET['codOrder'])) {

    $order = "";

    $idOrder = $_GET['codOrder'];

    if (is_numeric($idOrder)) {

        $db = new conect($_SESSION['rol']);

        $order = $db->getOrdersUser($user_id);
        ?>

        <!DOCTYPE html>
        <html lang="en">
            <?php
            require_once 'head.php';
            ?>
            <body class="body_userStandarPage">
                <div class="userStandarPage">
                    <div style="flex-direction: column;">
                        <div>
                            <?php
                            require_once 'header.php';
                            ?>
                        </div>

                    </div> 

                    <div class="div_accountUser">         
                        <p class="flicker1">&#x2618</p>
                        <div>
                            <h2>Mi cuenta</h2>
                            <p>+DETALLES DE LA CUENTA+</p>
                        </div>
                        <p class="flicker2">&#x2618</p>
                    </div>

                    <?php
                    foreach ($order as $key => $value) {



                        if ($_GET['codOrder'] == $value[0]) {

                            if ($value[5] == '1') {

                                $estado = "Pendiente de confimación";
                            } else {

                                $estado = "Confimado";
                            }

                            echo '<div class="windowOrder">'
                            . '<div class="cont_order"><label class="labelOrder">Número de pedido:</label> #' . $value[0] . '</div>'
                            . '<div class="cont_order"><label class="labelOrder">Fecha de pedido:</label> ' . $value[4] . '</div>'
                            . '<div class="cont_order"><label class="labelOrder">Estado del pedido:</label> ' . $estado . '</div>'
                            . '<table class="table table-sm">'
                            . '<thead>'
                            . '<tr>'
                            . '<th scope="col">Cod producto</th>'
                            . '<th scope="col">Cantidad</th>'
                            . '<th scope="col">Descripción</th>'
                            . '<th scope="col">Precio unidad</th>'
                            . '<th scope="col">Precio total</th>'
                            . '</tr>'
                            . '</thead>';

                            $arrayOrder = [];
                            $arrayKeys = [];
                            $cont = 0;

                            array_push($arrayOrder, $order[$_GET['codOrder']]);

                            $claves = array_keys($arrayOrder);

                            foreach ($arrayOrder as $v) {

                                array_push($arrayKeys, $v[1]);

                                echo

                                '<tbody>'
                                . '<tr>'
                                . '<th scope="row">' . $v[1] . '</th>'
                                . '<td>x1</td>'
                                . '<td>' . $v[2] . '</td>'
                                . '<td>' . $v[3] . '</td>'
                                . '<td></td>'
                                . '</tr>';

                                foreach ($v as $p) {


                                    if (is_array($p)) {

                                        array_push($arrayKeys, $p[1]);

                                        $valores = array_count_values($arrayKeys);

                                        foreach ($valores as $y => $x) {
                                            
                                        }

                                        echo '<tr>'
                                        . '<th scope="row">' . $p[1] . '</th>'
                                        . '<td>x' . $x . '</td>'
                                        . '<td>' . $p[2] . '</td>'
                                        . '<td>' . $p[3] . '</td>'
                                        . '<td></td>'
                                        . '</tr>';
                                        
                                        
                                    }
                                }
                            }

                            echo "<pre>";
                            print_r($arrayKeys);
                            echo "</pre>";
                            
                              echo "<pre>";
                            print_r($valores);
                            echo "</pre>";

                            echo '</tbody>'
                            . '</table>'
                            . '</div>';
                        }
                    }
                }
            } else {

                //poner aqui una pagina de error 404 personalizada
            }
            ?>
            <?php
            require_once 'footer.php';
            ?>
        </div>


        <!-- JavaScript Bundle with Popper.js -->
        <script src="/css/bootstrap5/js/bootstrap.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>

        <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
        <script src="js/dashboardUser.js"></script>
        <script src="js/updateAccountUser.js"></script>
        <script src="js/responsive_header.js"></script>
        <script src="js/updateAddressUser.js"></script>
        <script src="js/deleteImgUser.js"></script>
        <script src="js/deleteAccountUser.js"></script>
        <script src="js/index.js"></script>

    </body>
</html>






