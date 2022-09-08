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
    header('location:usersUpdates.php?updates=1');
}

if (!array_key_exists('updates', $_GET)) {
    $pag = $_GET['updates'];
}
?>

<!DOCTYPE html>
<html lang="en">
    <?php
    require_once 'head.php';
    ?>

    <body class="body_usersUpdates">
        
          <div class="usersUpdates">
            
        <div style="flex-direction: column;">
                <div>
                    <?php
                    require_once 'header.php';
                    ?>
                </div>
              
            </div> 
     

        <?php
        $usersByPage = 5;
        $page = $db->countUpdatesUsers();
        $totalPages = $page / 5;
        $totalPages = ceil($totalPages);

        if ($_GET['updates'] > $totalPages || $_GET['updates'] <= 0) {
            header('location:usersUpdates.php?updates=1');
        }

        $start = ($_GET['updates'] - 1) * $usersByPage;
        ?> 

              <div class="container-flex" style="margin-top: 8%;">
            <div class="row col-8">
                <div class="">
                    <div id="busqueda_admin" class="">
                        <form class="form-group my-3 my-lg-0" id="searchUpdate">
                            <input class="form-group col-3 p-2" type="search" placeholder="Código ID del usuario o email" aria-label="Search" name="updateUser" id="updateUser">
                            <button class="btn btn-outline-success p-2" type="button" name="btn_update" id="btn_update" style="margin-left:2%" onclick="searchUpdateUser()">Buscar</button>
                        </form>
                    </div>
                    <div class="" style="width:25%; margin-top: 1%">
                        <fieldset class="border p-2 rounded" style="margin-top: 2%">
                            <div class="calendario">
                                <div class="sombra">
                                    <div style="text-align: center">
                                        <h4>Búsqueda por fecha</h4>
                                    </div>
                                    <form class="d-flex flex-column" id="searchUpdateByDate">
                                        <label>Entre</label>
                                        <input type="date" id="fecha1" name="fecha1"><br>
                                        <label>Hasta</label>
                                        <input type="date" id="fecha2" name="fecha2"><br>
                                        <input type="button" value="Buscar actualización" id="btnUpdateByDate" class="btn btn-secondary" alt="boton de buscar" name="btnUpdateByDate" onclick="searchUpdateByDate()"style="margin-top:4%">
                                    </form>
                                </div>
                            </div>                  
                    </div>
                </div>
            </div>
        </div>   
  
                  
    <div id="table_users_updates" class="col-auto container-flex " style="margin-top:2%">
        <div class="row">
            <form>
                <fieldset class="border p-2">        
                    <div class="form-group">
                        <div class="flex-container" style="display: flex; justify-content: center">                               
                            <img src="images/update.svg" width="25px" height="30px"></img>                                                       
                         <h4 style="color: slategrey; margin-left: 10px">Actualizaciones de usuarios</h4><br><br>                        
                         </div>
                        <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">Anterior nombre</th>
                                    <th scope="col">Anterior apellido</th>
                                    <th scope="col">Anterior email</th>
                                    <th scope="col">Anterior telefono</th>
                                    <th scope="col">Anterior dirección</th>
                                    <th scope="col">Anterior ciudad</th>
                                    <th scope="col">Anterior codigo postal</th>
                                    <th scope="col">Anterior provincia</th>
                                    <th scope="col">Anterior imagen</th>
                                    <th scope="col">Anterior password</th>
                                    <th scope="col">Anterior fecha de registro</th>


                                    <th scope="col">Nuevo nombre</th>
                                    <th scope="col">Nuevo apellido</th>
                                    <th scope="col">Nuevo email</th>
                                    <th scope="col">Nuevo telefono</th>
                                    <th scope="col">Nueva dirección</th>
                                    <th scope="col">Nueva ciudad</th>
                                    <th scope="col">Nuevo código postal</th>
                                    <th scope="col">Nueva provincia</th>
                                    <th scope="col">Nueva imagen</th>
                                    <th scope="col">Nuevo password</th>                                
                                    <th scope="col">Nueva fecha de registro</th>
                                    <th scope="col">Usuario</th>
                                    <th scope="col">Fecha modificación</th>
                                </tr>
                            </thead>
                            <tbody>

                                <?php
                                $usuarios = $db->getUpdatesUsers($start, $usersByPage);

                                foreach ($usuarios as $v) {

                                    echo '<tr>'
                                    . '<td>' . $v[0] . '</td>'
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
                                    . '<td style="color:blue">' . $v[12] . '</td>'
                                    . '<td style="color:blue">' . $v[13] . '</td>'
                                    . '<td style="color:blue">' . $v[14] . '</td>'
                                    . '<td style="color:blue">' . $v[15] . '</td>'
                                    . '<td style="color:blue">' . $v[16] . '</td>'
                                    . '<td style="color:blue">' . $v[17] . '</td>'
                                    . '<td style="color:blue">' . $v[18] . '</td>'
                                    . '<td style="color:blue">' . $v[19] . '</td>'
                                    . '<td style="color:blue">' . $v[20] . '</td>'
                                    . '<td style="color:blue">' . $v[21] . '</td>'
                                    . '<td style="color:blue">' . $v[22] . '</td>'
                                    . '<td style="color:blue">' . $v[23] . '</td>'
                                    . '</tr>';
                                }
                                ?>
                            </tbody>
                        </table>
                            </div>

                        <nav aria-label="paginadoActualizacionesUsuarios" style="margin-left:40%">
                            <ul class="pagination">
                                <li class="page-item <?php echo $_GET['updates'] <= 1 ? 'disabled' : '' ?>">
                                    <a class="page-link " href="usersUpdates.php?updates=<?php echo $_GET['updates'] - 1; ?>">Anterior</a>
                                </li>


                                <?php for ($i = 0; $i < $totalPages; $i++): ?>

                                    <li class="page-item  <?php echo $_GET['updates'] == $i + 1 ? 'active' : '' ?>">
                                        <a  class="page-link" href="usersUpdates.php?updates=<?php echo $i + 1; ?>"><?php echo $i + 1; ?></a></li>

                                <?php endfor; ?>



                                <li class="page-item <?php echo $_GET['updates'] >= $totalPages ? 'disabled' : '' ?>">
                                    <a class="page-link"  href="usersUpdates.php?updates=<?php echo $_GET['updates'] + 1; ?>">Siguiente</a>
                                </li>
                            </ul>
                        </nav>



                    </div>
                </fieldset>
            </form>


        </div>
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
    <script src="js/searchUpdateByDate.js"></script>
    <script src="js/index.js"></script>

</body>
</html>