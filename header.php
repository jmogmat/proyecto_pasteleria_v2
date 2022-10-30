<?php
require_once(__DIR__ . '/autoload.php');

require_once 'modalCart.php';

use \conectDB\conectDB as conect;

$db = new conect($_SESSION['rol']);

$totalcantidad = "";

if(isset($_SESSION['carrito'])){
    
    $carrito = $_SESSION['carrito'];
}

if(isset($_SESSION['carrito'])){
    
    foreach ($_SESSION['carrito'] as $producto){
        
        $totalcantidad = ((int)$totalcantidad + (int)$producto['cantidad']);
    }
    
}

if(!isset($totalcantidad)){
    
    $totalcantidad = "";
    
} else {
    
    $totalcantidad = $totalcantidad;
}

?>
<header class="header" style="width: 70%;">
    <nav class="nav">    
            <a href="index.php"><img class="logo" src="images/logo.svg" alt="logo" /></a>
            <button class="nav-toggle" aria-label="Abrir menú"><i class="bi bi-list"></i></button>
            <ul class="nav-menu">
                <li class="nav-item">
                    <a class="nav-link" href="index.php" style="color:#a29676">Inicio<span class="sr-only"></span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="panaderia.php" style="color:#a29676">Panadería</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="pasteleria.php" style="color:#a29676">Pastelería</a>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="color:#a29676">Categorías</a>                  
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown" style="background-color: rgb(231,232,227); border: none; border-radius: 8px;">

                        <?php
                        $categorias = $db->load_categories();

                        foreach ($categorias as $key => $categoria) {

                            echo '<a class="dropdown-item" href="productsCategories.php?cod=' . $categoria['id'] . '" style="color:#a29676;">' . $categoria['nombre_categoria'] . '</a>';
                        }
                        ?>                 

                    </div>                   
                </li>  
                <li class="nav-item"><a class="nav-link" href="blog.php" class="pag_actual" style="color:#a29676">Blog</a></li>
                <li class="nav-item"><a class="nav-link" href="contacto.php" class="pag_actual" style="color:#a29676">Contacto</a></li>
                <li class="nav-item"><a class="nav-link" style="color:#a29676; cursor:pointer; font-size: 22px;">
                <i class="cart-shop fas fa-shopping-cart"  data-bs-toggle='modal' data-bs-target='#modalcart'></i><?php echo $totalcantidad; ?></a></li>
            
    <div class="log_user">
        
    <ul class="navbar-nav" style="margin-right: 1%">
        <li class="li_nav_categories">
            <?php
            $page = "";
            $rol = "";
            $us = "";
            $nombre = "";
            $apellido = "";

            if (isset($_SESSION['rol']) && $_SESSION['rol'] != '3') {

                $user = json_decode($_SESSION['usuario']);

                foreach ($user as $key => $v) {

                    if ($key == 'nombre') {

                        $nombre = $v;
                    }
                    if ($key == 'apellido') {

                        $apellido = $v;
                    }

                    if ($key == 'rol') {

                        $rol = $v;
                    }

                    $usuario = $nombre . " " . $apellido;
                }

                if ($rol == '1') {
                    $us = 'Administrador';
                } if ($rol == '2') {
                    $us = 'Usuario';
                }
                ?>

            <li class="nav-item dropdown">
                <a class="name_user nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="color:#a29676; font-size: 17px">
                    <?php echo $us . " " . $usuario; ?>
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown" style="background-color: rgb(231,232,227); border: none; border-radius: 8px;">
                    <?php
                    if ($rol == '1') {
                        ?>
                        <a class="dropdown-item" href="userAdminPage.php" name="logout" style="color:#a29676;">Productos y categorías</a>
                        <a class="dropdown-item" href="editionAdminPage.php" name="logout" style="color:#a29676;">Permisos de usuarios</a>
                        <a class="dropdown-item" href="orders.php" name="logout" style="color:#a29676;">Pedidos</a>                                              
                        <a class="dropdown-item" href="activeUsersInTheSystem.php" style="color:#a29676;">Usuarios activos</a>
                        <a class="dropdown-item" href="usersDeleted.php" style="color:#a29676;">Usuarios eliminados</a>
                        <a class="dropdown-item" href="usersUpdates.php" style="color:#a29676;">Actualizaciones de usuarios</a>                 
                        <a class="dropdown-item" href="logout.php" name="logout" style="color:#a29676;">Cerrar sesion</a>

                        <?php
                    } else if ($rol == '2') {
                        ?>
                        <a class="dropdown-item" href="userStandarPage.php" style="color:#a29676;">Escritorio</a>
                        <a class="dropdown-item" href="logout.php" name="logout" style="color:#a29676;">Cerrar sesion</a>  
                        <?php
                    }
                    ?>  
                </div>
            </li>  
   
       

    <?php } else { ?>
        <a class="btn_login" href="login.php"  style="color:#a29676; cursor:pointer; font-size: 32px">
            <i class="fa fa-user-circle" aria-hidden="true"></i>
        </a>
    </div>
    <?php } ?>
                
  </ul>
 </nav>
</header>

