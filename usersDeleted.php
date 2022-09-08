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


    <body class="body_usersDeleted">
        
        <div class="usersDeleted">
            
        <div style="flex-direction: column;">
                <div>
                    <?php
                    require_once 'header.php';
                    ?>
                </div>
              
            </div> 

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

            <div class="container-flex" style="margin-top:5%;">
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

            <div id="usersDeleted" class="col-auto container-fluid" style="margin-top: 2%;">
            <div class="row">
                <form id="form_users_deleted">
                    <fieldset class="border p-2">
                         <div class="flex-container" style="display: flex; justify-content: center">                               
                         <img src="images/equis.svg" width="25px" height="30px"></img>                                                       
                         <h4 style="color: slategrey; margin-left: 10px">Usuarios de baja en el sistema</h4><br><br>                        
                         </div>
                           
                            <div class="table-responsive" style="margin-top: 2%;">
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
                            </div>
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
     
        <?php
        require_once 'footer.php';
        ?>
            </div>
           
        <script src="/css/bootstrap5/js/bootstrap.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>

        <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
        <script src="js/responsive_header.js"></script>
        <script src="js/searchUserDeleted.js"></script>
        <script src="js/index.js"></script>

    </body>
</html>