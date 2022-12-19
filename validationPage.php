<?php

require_once __DIR__ . '/autoload.php';

use \functions\functions as func;

$sesion = new func();

$sesion->checkSession();


?>

<!DOCTYPE html>
<html lang="es">

<?php
require_once 'head.php';
?>

    <body class="body_index">

    <div style="margin-top: 10%;"></div>
    <div class="forumlario_de_validacion text-center" style="width: 40%; margin: 0 auto; height: 650px">
        <h1 style="color: #a29676;">Validar acceso</h1><br>
        <p>Te hemos enviado un código via SMS al teléfono móvil</p>
        <p>Introduce el código para validar tu móvil e iniciar sesión:</p>

        <form id="form">
        <input type="text" name="token" placeholder="Código" style="padding: 9px; width:50%;"><br><br>
        <input type="button" class="btn btn-primary m-3 p-3" value="Continuar" style="border-radius:0px; font-size:20px;" onclick="checkTokenUser()">
        </form>
        <br><br>
        <i class="bi bi-info-circle"></i> Dispones de 1 hora para utilizar el código que te hemos enviado.
    </div>

        <!-- JavaScript Bundle with Popper.js -->
        <script src="/css/bootstrap5/js/bootstrap.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
        <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
        <script src="js/checkTokenUser.js"></script>
    </body>

</html>