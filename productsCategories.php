<?php
require_once __DIR__ . '/autoload.php';

use functions\functions as func;
use \conectDB\conectDB as conect;

$sesion = new func();

$sesion->checkSession();
?>
<!DOCTYPE html>
<html lang="es">

    <?php
    require_once 'head.php';
    ?>

    <body class="body_productsCategories">
        <div class="grid_products">
            <div class="header_grid">
                <?php
                require_once 'header.php';
                ?>
            </div>

            <?php
            if (isset($_GET['cod'])) {

                $cod = $_GET['cod'];

                $db = new conect($_SESSION['rol']);

                $nameCategorie = $db->getNameCategorieById($cod);
            }
            ?>

            <h2 class="title_products">Categoría <?php echo $nameCategorie; ?></h2>

            <?php
            if (isset($_GET['cod'])) {

                $image = '';

                $products = $db->getAllProductsByIdCategorie($cod);

                $imgProducts = $db->getImgByCodCateorie($cod);

                foreach ($products as $v) {

                    foreach ($imgProducts as $i) {

                        if ($i['id'] == $v['id']) {

                            $nameImg = pathinfo($i['ruta'], PATHINFO_BASENAME);

                            if ($v['tipo_producto'] == '1') {

                                $image = 'images/imagenes_de_pasteles/' . $nameImg;
                            }
                            if ($v['tipo_producto'] == '2') {
                                $image = 'images/imagenes_de_pan/' . $nameImg;
                            }
                            ?>
                            <div class="products_cards shadow">                                                                                                                      
                                <img class="img_product_card" src="<?php echo $image; ?>" alt="<?php echo $v['nombre']; ?>"></img>                                                                                           
                                <form id="formCart<?php echo $v['id']; ?>" name="formCart">
                                    <input type="hidden" name="id" id="id" value="<?php echo $v['id']; ?>">
                                    <input type="hidden" name="nombre" id="nombre" value="<?php echo $v['nombre']; ?>">
                                    <input type="hidden" name="descripcion" id="descripcion" value="<?php echo $v['descripcion']; ?>">
                                    <input type="hidden" name="precio" id="precio" value="<?php echo $v['precio']; ?>">
                                    <input type="hidden" name="stock" value="<?php echo $v['cantidad']; ?>">
                                    <div class="card-body" style="text-align: center">
                                        <fieldset class="border p-2 rounded"">
                                            <h5><?php echo $v['nombre']; ?></h5>
                                            <p class=""><?php echo $v['descripcion']; ?></p>
                                            <p class="" style="font-size: 20px; font-weight: bold;"><?php echo $v['precio']; ?> €</p>
                                            <p class="" style="font-size: 15px;"><?php echo "En stock  ". $v['cantidad']; ?></p>
                                            <label style="padding: 3%;">Introducir cantidad</label><input type="number" name="cantidad" style="width:15%;" min="1" max="<?php echo $v['cantidad']; ?>" onkeyup="this.value=checkInputAmount(this.value)"><br><br>
                                            <button class="btn btn-primary" style="cursor:pointer; font-size: 15px;" onclick="event.preventDefault();addToCart(<?php echo $v['id']; ?>)"><i class="fas fa-shopping-cart"></i> Añadir al carrito</button>
                                        </fieldset>
                                    </div>
                                </form>
                            </div>
                            <?php
                        }
                    }
                }
            }
            ?>


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

        <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc="
        crossorigin="anonymous"></script>

        <script src="js/addToCart.js"></script>
        <script src="js/index.js"></script>
        <script src="js/checkInputAmount.js"></script>
    </body>

</html>

