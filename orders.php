<?php
require_once(__DIR__ . '/autoload.php');

use \functions\functions as func;
use \conectDB\conectDB as conect;

$tool = new func();

$tool->checkSession();

$db = new conect($_SESSION['rol']);

$user_id = json_decode($_SESSION['usuario'])->id;

$userData = $db->getUserData($user_id);
?>

<!DOCTYPE html>
<html lang="en">
    <?php
    require_once 'head.php';
    ?>
    <body class="body_userStandarPage">
        
        <div class="userStandarPage">

            <?php
            require_once 'header.php';
            ?>
             
            <div class="wrapper menuLateralUser rounded-3 p-3">
                    <?php
                $imgUsuario = $db->getImgUser($user_id); //Obtenemos la ruta completa donde se encuentra el fichero

                $extension = pathinfo($imgUsuario, PATHINFO_EXTENSION); //Obtenemos la extensión del fichero

                $imagen = 'imgUsers/codigoUsuario_' . $user_id . '/' . $user_id . '.' . $extension; //Creamos la ruta concatenando los valores para poder ponerlos en el atributo src de la imagen del usuario

                if ($imgUsuario == "") {
                    ?>

                    <span class="d-flex image mr-half inline-block justify-content-center">
                        <div>
                            <object type="image/svg+xml" data="imgUsers//avatar.svg">
                                <img class="img_user_default img-fluid rounded-circle" src="/img_users/avatar.svg" alt="imagen_de_usuario"></img>
                            </object>
                        </div>
                    </span>


                    <?php
                } else {
                    ?>        
                    <span class="d-flex image inline-block justify-content-center" >
                        <div class="">
                            <img class="img_user_profile img-fluid rounded-circle p-3" id="imgUsuario" src="<?php echo $imagen; ?>"  alt="imagen_de_usuario" ></img>
                        </div>
                    </span>          
                    <br>

                <?php } ?>

                    <div id="orders">
                        
                            <h1 class="text-center iconosUser bi bi-bag-heart mt-3"  style="color: #a29676;"> Tus pedidos</h1>
                            <table class="tableOrders table-responsive table table-bordered w-50 m-auto windowOrder" id="tabla_pedido" style="border: 2px solid #a29676; color: #a29676">
                            <thead>
                                <tr>
                                    <th scope="col"><i class="bi bi-calendar"></i> Fecha pedido</th>
                                    <th scope="col"><i class="bi bi-code"></i> Código del pedido</th>
                                    <th scope="col"><i class="bi bi-info-circle"></i> Información de pedidos</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $orders = $db->getOrdersUser($user_id);

                                if (!empty($orders)) {

                                    foreach ($orders as $key => $value) {
                                        ?>                          
                                        <tr>
                                            <td><?php echo substr($value[4], 0, -8); ?></td>                                 
                                            <td>#<?php echo $value[0]; ?></td>
                                            <td><a class="link_order" href='detailsOrder.php?codOrder=<?php echo $value[0]; ?>' style="color: #a29676"><i class="bi bi-eye"></i> Ver detalle del pedido</a></td>
                                        </tr>

                                        <?php
                                    }
                                } else {

                                    //Meter un alert por aquí
                                }
                                ?>
                            </tbody>
                        </table>
                        <div class="text-center mt-3"><button class="btn btn-primary m-auto w-50" onclick="returnDashboard();">Regresar al escritorio</button></div>
                    
                    </div>
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



