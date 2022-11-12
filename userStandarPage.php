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

            <div class="menuLateralUser rounded-3 p-3">
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

                <?php
                echo '<div class="userName"><h1>Bienvenido/a</h1><h3>' . $userData['nombre'] . " " . $userData['apellido'] . '</h3></div>';
                ?>
                <div class="d-flex w-100" id="textWellcomePanelUser" style="display: inline">
                    <p class="text-center p_helloUser m-5" id="p_helloUser" style="display: inline">Hola <?php echo '<b>' . $userData['nombre'] . " " . $userData['apellido'] . '</b>' ?>! Desde el escritorio de tu cuenta puedes ver tus pedidos recientes, gestionar tus direcciones de envío y facturación, editar tu contraseña y los detalles de tu cuenta.</p>                             
                </div>  
                <div id="contenido">
                    <fieldset>
                        <div id="dashboardUser" class="d-flex justify-content-center flex-wrap">
                            <button id="btn1"  class="bPanelUser col-xxl-2 col-xl-2 col-md-3 col-sm-3 col-10" id="escritorio" onclick="dashboardProfileUser()"><i class="bi bi-laptop"><br></i>Escritorio</button>                    
                            <button id="btn2"  class="bPanelUser col-xxl-2 col-xl-2 col-md-3 col-sm-3 col-10" data-bs-toggle="modal" data-bs-target="#modal1" ><i class="bi bi-pencil"><br></i>Editar cuenta</button>
                            <button id="btn3"  class="bPanelUser col-xxl-2 col-xl-2 col-md-3 col-sm-3 col-10" onclick="checkOrders()"><i class="iconosUser bi bi-bag-heart"><br></i>Pedidos</button> 
                            <button id="btn4"  class="bPanelUser col-xxl-2 col-xl-2 col-md-3 col-sm-3 col-10" onclick="addressBilling()"><i class="bi bi-geo-alt"><br></i>Dirección</button>
                            <button id="btn5"  class="bPanelUser col-xxl-2 col-xl-2 col-md-3 col-sm-3 col-10" onclick="deleteImgUser()"></i><i class="bi bi-trash"></i><br>Eliminar imagen de perfil</button>
                            <button id="btn6"  class="bPanelUser col-xxl-2 col-xl-2 col-md-3 col-sm-3 col-10" onclick="deleteAccountUser()"></i><i class="bi bi-person-x"></i><br>Eliminar cuenta</button>
                            <button id="btn7"  class="bPanelUser col-xxl-2 col-xl-2 col-md-3 col-sm-3 col-10" onclick="logout()"><i class="bi bi-box-arrow-right"><br></i>Salir</button>
                            <input id="userId" type="text" value="<?php echo $user_id; ?>" hidden="hidden">
                        </div>
                    </fieldset>

                    <div id="editProfileUser" class="container">
                        <div class="modal" tabindex="-1" id="modal1">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h2>Editar cuenta</h2>
                                    </div>
                                    <div class="modal-body">
                                        <form id="form_edit_profile">
                                            <div class="form-group">
                                                <p>Nombre visible: <?php echo '<b>' . $userData['nombre'] . " " . $userData['apellido'] . '</b>'; ?></p><br>
                                                <div class="row row-cols-2">
                                                    <div style="margin-top: 2%">
                                                        <label style="font-weight: bold">Nombre *</label><br>
                                                        <input type="text" id="user_name" name="user_name" value="<?php echo $userData['nombre']; ?>" style="padding: 1.8%">   
                                                    </div>
                                                    <div style="margin-top: 2%">
                                                        <label style="font-weight: bold">Apellido *</label><br>
                                                        <input type="text" id="surnameUser" name="surnameUser" value="<?php echo $userData['apellido']; ?>" style="padding: 1.8%">
                                                    </div>
                                                </div><br>
                                                <label style="font-weight: bold">Email *</label><br>
                                                <input type="text" id="user_email" name="user_email" value="<?php echo $userData['email']; ?>" style="padding: 1%; width: 100%"><br><br>
                                                <label style="font-weight: bold">Telefono *</label><br>
                                                <input type="text" id="user_phone" name="user_phone" value="<?php echo $userData['telefono']; ?>" style="padding: 1%; width: 100%"><br><br>
                                                <div style='display: flex;'>
                                                    <div class="col-5 my-3 p-3">
                                                        <label class="form-label">Subir una imagen:</label>
                                                        <input id="user_img" class="form-control form-control-sm " type="file" name="user_img" style="width: 250%"><br>
                                                        <label style="color: darkgrey">Formato de imagen permitido: svg, jpeg, png.</label><br>
                                                    </div>
                                                </div>
                                                <div>
                                                    <p style="font-weight: bold">CAMBIO DE CONTRASEÑA</p>
                                                    <label>Contraseña actual (déjalo en blanco para no cambiarla)</label><br>
                                                    <input type="password" id="currentPWD" name="currentPWD" style="width: 100%"><br><br>
                                                    <label>Nueva contraseña (déjalo en blanco para no cambiarla)</label><br>
                                                    <input type="password" id="newPWD" name="newPWD" style="width: 100%"><br><br>
                                                    <label>Confirmar nueva contraseña (déjalo en blanco para no cambiarla)</label><br>
                                                    <input type="password" id="newPWD2" name="newPWD2" style="width: 100%"><br><br><br>
                                                </div>
                                                <input type="button" id="btn_editProfileUser" name="btn_editProfileUser" value="GUARDAR LOS CAMBIOS" class="btn btn-secondary" onclick="updateAccountUser()">
                                            </div>
                                        </form>
                                    </div>
                                    <div class="modal-footer">
                                        <button class="btn btn-danger" data-bs-dismiss="modal">Cerrar</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <div id="addressBilling" style="display: none; font-size: 1.35em;">
                    <p class="text-center">Las siguientes direcciones se utilizarán por defecto en la página de pago.</p><br><br>
                    <address>
                        <label style="font-weight: bold">Dirección de facturación y envio</label><br><br>
                        <a id="a_billing" style="cursor: pointer;" data-bs-toggle="modal" data-bs-target="#modal2">** Editar **</a>
                        <p style="margin-top: 2%;"><?php echo '<i>' . $userData['nombre'] . " " . $userData['apellido'] . '</i>'; ?></p>
                        <p><?php echo '<i>' . $userData['direccion'] . " CP: " . $userData['codigo_postal'] . " " . $userData['ciudad'] . '</i>'; ?></p>
                        <p><?php echo '<i>' . $userData['provincia'] . '</i>'; ?></p>
                    </address>
                </div>

                <div id="editAddressUser" class="container">
                    <div class="modal" tabindex="-1" id="modal2">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5>Editar dirección</h5>
                                </div>
                                <div class="modal-body">
                                    <form id="form_edit_address">
                                        <div class="form-group">
                                            <label style="font-weight: bold">Dirección *</label><br>
                                            <input type="text" id="user_address" name="user_address" value="<?php echo $userData['direccion']; ?>" style="padding: 1%; width: 100%"><br><br>
                                            <label style="font-weight: bold">Ciudad *</label><br>
                                            <input type="text" id="city" name="city" value="<?php echo $userData['ciudad']; ?>" style="padding: 1%; width: 100%"><br><br>
                                            <div class="row row-cols-2">
                                                <div>
                                                    <label style="font-weight: bold">Codigo Postal *</label><br>
                                                    <input type="text" id="user_postal_code" name="user_postal_code" value="<?php echo $userData['codigo_postal']; ?>" style="padding: 2%">   
                                                </div>
                                                <div>
                                                    <label style="font-weight: bold">Provincia *</label><br>
                                                    <select name="province" id="province" class="form-select form-select-sm mb-2 mt-1" >
                                                        <option value="A Coruña">A Coruña</option>
                                                        <option value="Lugo">Lugo</option>
                                                        <option value="Ourense">Ourense</option>
                                                        <option value="Pontevedra">Pontevedra</option>
                                                    </select><br><br>
                                                </div>
                                            </div><br>
                                            <input type="button" id="btn_editAddress" name="btn_editAddress" value="GUARDAR LOS CAMBIOS" class="btn btn-secondary" onclick="updateAddressUser()">                                                     
                                        </div>
                                    </form>
                                </div>
                                <div class="modal-footer">
                                    <button class="btn btn-danger" data-bs-dismiss="modal">Cerrar</button>
                                </div>
                            </div>
                        </div>
                    </div>
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
        <script src="js/checkOrders.js"></script>

    </body>
</html>


