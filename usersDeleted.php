<?php
require_once(__DIR__ . '/autoload.php');

use \functions\functions as func;
use \conectDB\conectDB as conect;

$tool = new func();

$tool->checkSession();

$db = new conect($_SESSION['rol']);

$user_id = json_decode($_SESSION['usuario'])->id;

$userData = $db->getUserData($user_id);

if (!$_GET) {
    header('location:usersDeleted.php?pagUsersDeleted=1');
}

if (!array_key_exists('pagUsersDeleted', $_GET)) {
    $pag = $_GET['pagUsersDeleted'];
}
?>

<!DOCTYPE html>
<html lang="en">

    <?php
    require_once 'head.php';
    ?>


    <body style="background-color: whitesmoke">
        <div class="container-flex">
            <?php
            require_once 'header.php';
            if (($_SERVER["REQUEST_METHOD"] == "POST") && isset($_POST['registeredUsers'])) {
                header('location:registeredUsers.php');
            }
            ?>
        </div>

        <?php
        require_once 'navAdminPanel.php';
        ?>


        <?php
        $usersByPage = 5;
        $page = $db->getTotalUsersDeleted();
        $totalPages = $page / 5;
        $totalPages = ceil($totalPages);

        if ($_GET['pagUsersDeleted'] > $totalPages || $_GET['pagUsersDeleted'] <= 0) {
            header('location:usersDeleted.php?pagUsersDeleted=1');
        }

        $start = ($_GET['pagUsersDeleted'] - 1) * $usersByPage;
        ?>

        <div class="container-flex m-3">
            <div class="row">
                <div class="">
                    <div id="busqueda_admin" class="" style="margin-top:3%">
                        <form class="form-group my-3 my-lg-0" id="searchUserActive">
                            <input class="form-group col-2 p-2" type="search" placeholder="Código ID del usuario o email" aria-label="Search" name="userDeleted" id="userDeleted">
                            <button class="btn btn-outline-success p-2" type="button" name="boton_buscar_admin" id="boton_buscar_admin" style="margin-left:2%" onclick="searchUserDeleted()">Buscar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div id="usersDeleted" class="col-auto container-fluid">
            <div class="row">
                <form id="form_users_deleted">
                    <fieldset class="border p-2">
                        <div class="form-group">
                            <div class="flex-container" style="display: flex">
                                <div style="margin-left: 35%"><object type="image/svg+xml" data="images/equis.svg" style="width: 25px; height: 30px"><img src="images/equis.svg"></img></object></div>
                                <div style="align-content:center"><h4 style="color:slategrey; margin-left: 10px">Usuarios de baja en el sistema</h4><br><br></div>
                            </div>
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th scope="col">Código</th>
                                        <th scope="col">Nombre</th>
                                        <th scope="col">Apellido</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">Telefono</th> 
                                        <th scope="col">Dirección</th> 
                                        <th scope="col">Ciudad</th> 
                                        <th scope="col">Código postal</th> 
                                        <th scope="col">Provincia</th>
                                        <th scope="col">Imagen</th> 
                                        <th scope="col">Password</th> 
                                        <th scope="col">Rol</th>
                                        <th scope="col">Fecha de registro</th> 
                                        <th scope="col">Último acceso</th> 
                                        <th scope="col">Status</th> 
                                    </tr>
                                </thead>
                                <tbody>

                                    <?php
                                    $usuarios = $db->getUsersDeleted($start, $usersByPage);

                                    foreach ($usuarios as $v) {

                                        echo '<tr>'
                                        . '<td  style="color:darkred">' . '# ' . $v[0] . '</td>'
                                        . '<td>' . $v[1] . '</td>'
                                        . '<td>' . $v[2] . '</td>'
                                        . '<td>' . $v[3] . '</td>'
                                        . '<td>' . $v[4] . '</td>'
                                        . '<td>' . $v[5] . '</td>'
                                        . '<td>' . $v[6] . '</td>'
                                        . '<td>' . $v[7] . '</td>'
                                        . '<td>' . $v[8] . '</td>'
                                        . '<td>' . $v[9] . '</td>'
                                        . '<td>' . $v[10] . '</td>'
                                        . '<td>' . $v[11] . '</td>'
                                        . '<td>' . $v[12] . '</td>'
                                        . '<td>' . $v[13] . '</td>'
                                        . '<td style="color:darkgreen; font-weight: bolder">' . $v[14] . '</td>'
                                        . '</tr>';
                                    }
                                    ?>
                                </tbody>
                            </table>
                            <nav aria-label="paginadoUsuarios" style="margin-left:40%">
                                <ul class="pagination">
                                    <li class="page-item <?php echo $_GET['pagUsersDeleted'] <= 1 ? 'disabled' : '' ?>">
                                        <a class="page-link " href="usersDeleted.php?pag=<?php echo $_GET['pagUsersDeleted'] - 1; ?>">Anterior</a>
                                    </li>


                                    <?php for ($i = 0; $i < $totalPages; $i++): ?>

                                        <li class="page-item  <?php echo $_GET['pagUsersDeleted'] == $i + 1 ? 'active' : '' ?>">
                                            <a  class="page-link" href="usersDeleted.php?pag=<?php echo $i + 1; ?>"><?php echo $i + 1; ?></a></li>

                                    <?php endfor; ?>

                                    <li class="page-item <?php echo $_GET['pagUsersDeleted'] >= $totalPages ? 'disabled' : '' ?>">
                                        <a class="page-link"  href="usersDeleted.php?pag=<?php echo $_GET['pagUsersDeleted'] + 1; ?>">Siguiente</a>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                    </fieldset>
                </form>


            </div> 
        </div>

        <div id="tableUsersDeleted"  class="col-auto container-fluid" style="margin-top:2%; display: none">
            <div class="row">
                <fieldset class="border p-2">
                    <div class="form-group">
                        <div class="flex-container" style="display: flex">
                            <div style="margin-left: 35%"><object type="image/svg+xml" data="images/aprobado.svg" style="width: 25px; height: 30px"><img src="images/aprobado.svg"></img></object></div>
                            <div style="align-content:center"><h4 style="color: slategrey; margin-left: 10px">Usuarios de alta en el sistema</h4><br><br></div>
                        </div>
                        <table class="table table-hover" >
                            <thead>
                                <tr>
                                    <th scope="col">Código</th>
                                    <th scope="col">Nombre</th>
                                    <th scope="col">Apellidos</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Telefono</th> 
                                    <th scope="col">Dirección</th> 
                                    <th scope="col">Ciudad</th> 
                                    <th scope="col">Código postal</th> 
                                    <th scope="col">Provincia</th> 
                                    <th scope="col">Rol</th>
                                    <th scope="col">Fecha de registro</th> 
                                    <th scope="col">Último acceso</th> 
                                    <th scope="col">Status</th> 
                                </tr>
                            </thead>
                            <tbody>

                                <tr id="tr_search_user">
                                    <td id="td_search_user_1"></td>
                                    <td id="td_search_user_2"></td>
                                    <td id="td_search_user_3"></td> 
                                    <td id="td_search_user_4"></td>
                                    <td id="td_search_user_5"></td>
                                    <td id="td_search_user_6"></td> 
                                    <td id="td_search_user_7"></td>
                                    <td id="td_search_user_8"></td>
                                    <td id="td_search_user_9"></td> 
                                    <td id="td_search_user_10"></td>
                                    <td id="td_search_user_11"></td>
                                    <td id="td_search_user_12"></td> 
                                    <td id="td_search_user_13"></td> 
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </fieldset>
            </div>
        </div>



        <?php
        require_once 'footer.php';
        ?>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-popRpmFF9JQgExhfw5tZT4I9/CI5e2QcuUZPOVXb1m7qUmeR2b50u+YFEYe1wgzy"crossorigin="anonymous"></script>
        <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
        <script src="js/responsive_header.js"></script>
        <script src="js/searchUserDeleted.js"></script>

    </body>
</html>