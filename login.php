<?php
require_once(__DIR__ . './autoload.php');

use \functions\functions as func;
use \conectDB\conectDB as conect;

error_reporting(E_ALL);
ini_set("display_errors", 1);

$tool = new func();

$tool->checkSession();

$db = new conect($_SESSION['rol']);
?>

<!DOCTYPE html>
<html lang="es">

    <?php
    require_once 'head.php';
    ?>


    <body class="body_login">
        <div class="grid_login">
            <div class="header_grid">
                <?php
                require_once 'header.php';
                ?>
            </div>

            <div class="card_login" style="background-color: whitesmoke;" id="login">
                <fieldset class="border p-2 rounded shadow">
                    <main class="form-signin">
                        <form id="form_login">
                            <br>
                            <h4 class="fw-normal" style="text-align:center">¿Ya eres cliente?</h4><br>
                            <div class="form-floating">
                                <input type="email" class="form-control" name="emailLogin" required placeholder="name@example.com">
                                <label for="floatingInput">Correo eléctronico</label>
                            </div>
                            <br>
                            <div class="form-floating">
                                <input type="password" class="form-control" name="passLogin" required placeholder="Password">
                                <label for="floatingPassword">Contraseña</label>
                            </div>
                            <br>
                            <div class="checkbox mb-3">
                                <label>
                                    <input type="checkbox" value="remember-me"> Recuérdame
                                </label>
                            </div>
                            <button class="w-100 btn btn-lg btn-primary" type="submit" id="btn_login" onclick="event.preventDefault();loginUser()">Iniciar sesión</button>
                        </form><br><br>
                            <h4 class="fw-normal" style="text-align:center">¿Todavía no eres cliente?</h4>
                            <h6 style="text-align:center">¡No esperes más!</h6>
                            <button type="button" class="w-100 btn btn-lg btn-secondary" id="btn_registrarme" onclick="change1()"><p style="color:white; margin: 0 auto;">Crea una cuenta</p></button>
                            <br><br>
                        <h4 class="text-center">¿Has recibido un SMS de autenticación?</h4>
                        <button type="button" class="w-100 btn btn-lg btn-secondary" onclick="authenticate()">Autenticarme</button>
                    </main>
                </fieldset>
            </div>

            <div class="card_login" style="display: none; background-color: whitesmoke;" id="register">
                <fieldset class="border p-2 rounded shadow">
                    <main class="form-signin">
                        <form id="registerUserForm">
                            <br>

                            <h4 class="fw-normal" style="text-align:center">Crea tu cuenta</h4><br>

                            <div class="form-floating">
                                <input type="text" class="form-control" name="name" id="name" required placeholder="name@example.com">
                                <label for="floatingInput">Nombre</label>
                            </div><br>
                            <div class="form-floating">
                                <input type="text" class="form-control" name="surname" id="surname" required placeholder="name@example.com">
                                <label for="floatingInput">Apellido</label>
                            </div><br>

                            <div class="form-floating">
                                <input type="email" class="form-control" name="email" id="email" required placeholder="name@example.com">
                                <label for="floatingInput">Correo eléctronico</label>
                            </div><br>
                            <div class="form-floating">
                                <input type="text" class="form-control" name="phone" id="phone" required placeholder="name@example.com">
                                <label for="floatingInput">Telefono</label>
                            </div><br>
                            <div class="form-floating">
                                <input type="password" class="form-control" name="pass1" id="pass1" required placeholder="Password">
                                <label for="floatingPassword">Contraseña</label>
                            </div><br>
                            <div class="form-floating">
                                <input type="password" class="form-control" name="pass2" id="pass2" required placeholder="Password">
                                <label for="floatingPassword">Rep-contraseña</label>
                            </div><br>
                            <br>                  
                            <button type="button" class="w-100 btn btn-lg btn-primary" name="btn_register" id="register" onclick="registerUser()">Registrarme</button>
                        </form>
                        <br>
                        <fieldset class="border p-2 rounded" >
                            <h4 class="fw-normal" style="text-align:center">¿Ya tienes cuenta?</h4>
                            <h6 style="text-align:center">¡Logueate!</h6>
                            <button type="button" class="w-100 btn btn-lg btn-light" id="btn_loguearme" onclick="change2()" style=".btn-light{background-color: red;}"><p style="color: #a29676; margin: 0 auto;">Iniciar sesión</p></button>
                        </fieldset>
                    </main>
                </fieldset>
            </div>


            <div class="footer_grid">
                <?php
                require_once 'footer.php';
                ?>
            </div>
        </div>

        <!-- JavaScript Bundle with Popper.js -->

        <script src="/css/bootstrap5/js/bootstrap.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>

        <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
        <script src="js/responsive_header.js"></script>
        <script src="js/register.js"></script>
        <script src="js/loginUser.js"></script>
        <script src="js/registerAndLogin.js"></script>
        <script src="js/index.js"></script>
       

    </body>

</html>