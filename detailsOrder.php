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

                    <div>
                        <?php
                        require_once 'header.php';
                        ?>
                    </div>

                    <div class="menuLateralUser rounded-3 p-5">
                        
                         <?php
                $imgUsuario = $db->getImgUser($user_id); //Obtenemos la ruta completa donde se encuentra el fichero

                $extension = pathinfo($imgUsuario, PATHINFO_EXTENSION); //Obtenemos la extensión del fichero

                $imagen = 'imgUsers/codigoUsuario_' . $user_id . '/' . $user_id . '.' . $extension; //Creamos la ruta concatenando los valores para poder ponerlos en el atributo src de la imagen del usuario

                if ($imgUsuario == "") {
                    ?>

                  <span class="d-flex image inline-block justify-content-center">
                        <div>
                            <img class="img_user_default img-fluid rounded-circle p-3" src="imgUsers/user_icon.png" alt="icono_de_usuario"></img>                      
                        </div>
                    </span>


                    <?php
                } else {
                    ?>        
                    <span class="d-flex image inline-block justify-content-center" >
                        <div>
                            <img class="img_user_profile img-fluid rounded-circle p-3" id="imgUsuario" src="<?php echo $imagen; ?>"  alt="imagen_de_usuario" ></img>
                        </div>
                    </span>          
                    <br>

                <?php } ?>

                        <h2 class="text-center"style="color: #a29676;"><i class="bi bi-info-circle"></i> Detalles del pedido</h2>


                        <?php
                        foreach ($order as $key => $value) {



                            if ($_GET['codOrder'] == $value[0]) {


                                echo '<div class="windowOrder rounded-3 m-auto w-50">'
                                . '<label class="labelOrder">Número de pedido:</label> #' . $value[0] . '<br>'
                                . '<label class="labelOrder">Fecha de pedido:</label> ' . $value[4]
                                . '<table class="tableDetailsOrder table table-responsive table-bordered w-100 m-auto table-sm" style="color:#a29676;border: 2px solid #a29676;">'
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
                                $totalCantidad = 0;
                                $arrayPrices = [];

                                $totalCantidad = $value[5] * $value[3];

                                array_push($arrayOrder, $order[$_GET['codOrder']]);

                                $claves = array_keys($arrayOrder);

                                foreach ($arrayOrder as $v) {

                                    array_push($arrayKeys, $v[1]);

                                    echo

                                    '<tbody>'
                                    . '<tr>'
                                    . '<th scope="row">' . $value[1] . '</th>'
                                    . '<td>x ' . $value[5] . '</td>'
                                    . '<td>' . $value[2] . '</td>'
                                    . '<td>' . $value[3] . ' €</td>'
                                    . '<td>' . $totalCantidad . ' €</td>'
                                    . '</tr>';
                                    array_push($arrayPrices, $totalCantidad);

                                    foreach ($v as $p) {


                                        if (is_array($p)) {

                                            array_push($arrayKeys, $p[1]);

                                            $totalCantidad2 = $p[5] * $p[3];

                                            echo '<tr>'
                                            . '<th scope="row">' . $p[1] . '</th>'
                                            . '<td>x ' . $p[5] . '</td>'
                                            . '<td>' . $p[2] . '</td>'
                                            . '<td>' . $p[3] . ' €</td>'
                                            . '<td>' . $totalCantidad2 . ' €</td>'
                                            . '</tr>';
                                            array_push($arrayPrices, $totalCantidad2);
                                        }
                                    }

                                    echo '<tr>'
                                    . '<td></td>'
                                    . '<td></td>'
                                    . '<td></td>'
                                    . '<td style="color:red;font-weight:bold;">TOTAL</td>'
                                    . '<td style="color:red;font-weight:bold;">' . array_sum($arrayPrices) . '€</td>'
                                    . '</tr>';
                                }

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
                        <div class="text-center mt-3"><button class="btn btn-primary m-auto w-50" onclick="returnListOrders();">Regresar al listado</button></div>
            </div>
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






