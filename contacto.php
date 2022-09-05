<?php
require_once __DIR__ . '/autoload.php';

use functions\functions as func;

$sesion = new func();

$sesion->checkSession();
?>
<!DOCTYPE html>
<html lang="es">

    <?php
    require_once 'head.php';
    ?>

    <body class="body_contacto">

        <div class="grid_contacto">
            <div class="header_grid">
                <?php
                require_once 'header.php';
                ?>
            </div>

            <div class="information_shop">
                <div class="container post-fila mt-5 mr-0">
                    <div class="row mt-5 align-items-center">
                        <div class="col">
                            <ul class="list-group text-contact mt-5">
                                <li class="list-group-horizontal list-inline py-2 bi bi-person-fill"> <b>Nombre:</b> Juan Lopéz</li>
                                <li class="list-group-horizontal list-inline py-2 bi bi-house-door-fill "> <b>Dirección:</b> <a href="https://www.google.com/search?channel=trow2&client=firefox-b-d&q=Avenida+de+Galicia%2C+n%C2%BA+134" data-toggle="tooltip"
                                                                                                                                data-placement="left" title="Nueva dirección!" id="enlace_direccion">Avenida de Galicia, nº 134</a></li>
                                <li class="list-group-horizontal list-inline py-2 bi bi-telephone-fill"> <b>Teléfono:</b> 986000000</li>
                                <li class="list-group-horizontal list-inline py-2 bi bi-envelope-fill "> <b>Email:</b> contacto@panaderias.ml</li>
                                <li class="list-group-horizontal list-inline py-2 bi bi-clock-fill "> <b>Horarios:</b>
                                    <div class="horarios">De lunes a sábado: 8:30 a 20:00<br>Domingos y festivos: 10:00 a 14:00<div>
                                            </li>
                                            </ul>
                                        </div>
                                        <div class="col my2">
                                            <div class="column" id="leafletMap"></div>
                                        </div>
                                    </div>

                                    </div>
                                    </div>

                                    <!-- Sección Formulario Contacto -->
                                    <div class="form_contact container mb-4">
                                        <h1>Formulario de Contacto</h1>
                                        <form>
                                            <div class="mb-3">
                                                <label for="nombre" class="form-label">Nombre:</label>
                                                <input type="text" class="form-control" placeholder="Escribe tu nombre completo..." id="nombre" aria-describedby="emailHelp">
                                            </div>
                                            <div class="mb-3">
                                                <label for="email" class="form-label">Email:</label>
                                                <input type="email" class="form-control" placeholder="Escribe tu email..." id="email">
                                            </div>
                                            <div class="mb-3">
                                                <label for="mensaje">Mensaje:</label>
                                                <textarea class="form-control" placeholder="Escribe tu mensaje..." id="mensaje"
                                                          style="height: 100px"></textarea>
                                            </div>

                                            <div class="mb-3 form-check">
                                                <input type="checkbox" class="form-check-input" id="terminos">
                                                <label class="form-check-label" for="terminos"><a href="politica_privacidad.html" target="_blank" style="text-decoration: none;">Acepto los términos y condiciones</a></label>
                                            </div>
                                        </form>
                                        <button class="btn btn-primary" data-toggle="popover" title="Ups!" data-content="Este formulario aún no esta activo, pero nos puede escribir a nuestro email.">Enviar</button>
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
                                    <!-- Leaflet Map Library -->
                                    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"
                                            integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA=="
                                    crossorigin=""></script>
                                    <script src="js/mapa.js"></script>
                                    <!-- Javascript Header -->
                                    <script src="js/responsive_header.js"></script>
                                    <script src="js/functions.js"></script>
                                    <script src="js/index.js"></script>
                                    </body>

                                    </html>