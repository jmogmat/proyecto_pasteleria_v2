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

      <div class="grid_container">

<?php
require_once 'header.php';
?>
    
        <div class="slider">
            <ul class="ul_slider">
                <li class="li_slider">
                    <img src="images/banner-1.webp" class="img_slider" />
                </li>
                <li class="li_slider">
                    <img src="images/banner-2.webp" class="img_slider" />
                </li>
                <li class="li_slider">
                    <img src="images/banner-3.webp" class="img_slider" />
                </li>
            </ul>
        </div>

        <div class="texto_index">
            <h1 class="titulo_index">Nuestra Historia</h1>
            <p class="p_index">Nacimos durante el estado de alarma, sabemos que fue un momento duro para todos, pero
                nosotros
                nos pasamos toda la cuarentena en casa haciendo postres cuando se nos ocurrió lanzar Panaderías M.L., queremos
                reinventar la forma de estar más cerca de vosotros sin estarlo. Todo ello cumpliendo las más estrictas normas
                de seguridad para
                que recibáis todos nuestros producto con la mejor calidad y libre de cualquier agente infeccioso.
                En Panaderias M.L. tenemos una gran pasión por nuestro pan, repostería y vuestra
                felicidad. Todos
                los días de nuestra tienda física y online sale un cliente satisfecho.</p>
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
        <script src="/js/index.js"></script>
        <script src="/js/deleteCart.js"></script>

    </body>

</html>