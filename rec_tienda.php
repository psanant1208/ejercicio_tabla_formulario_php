<?php
session_start();

if(!isset($_SESSION['$arrrayProducts'])){
    $_SESSION['$arrrayProducts']=[
        ["identification"=>1, "name"=>"Teclado", "price"=>80, "category"=>"entrada", "stock"=>50],
        ["identification"=>2, "name"=>"Ratón", "price"=>60, "category"=>"entrada", "stock"=>48],
        ["identification"=>3, "name"=>"Monitor", "price"=>150, "category"=>"salida", "stock"=>35],
        ["identification"=>4, "name"=>"Webcam", "price"=>80, "category"=>"entrada", "stock"=>20],
        ["identification"=>5, "name"=>"Auriculares", "price"=>70, "category"=>"salida", "stock"=>62],
        ["identification"=>6, "name"=>"Alfombrilla", "price"=>15, "category"=>"complemento", "stock"=>100]
    ];
};

if(!isset($_SESSION['$arrrayCart']) || isset($_POST['deleteCart'])){
    $_SESSION['$arrrayCart']=[];
};

if(!isset($_GET['option'])){
    $_GET['option']='catalogo';
};

if(isset($_POST['arrayCheck'])){
    foreach($_POST['arrayCheck'] as $cod){
        foreach($_SESSION['$arrrayProducts'] as $pro){
            if($pro['identification']==$cod){
                $_SESSION['$arrrayCart'][]=$pro;
            };
        };
    };
};

$nextCod=0;
foreach($_SESSION['$arrrayProducts'] as $pro){
    if($pro['identification']>$nextCod){
        $nextCod=$pro['identification']+1;
    };
};

if(isset($_POST['newName'])){
    $_SESSION['$arrrayProducts'][]=[
        "identification"=>$nextCod, 
        "name"=>$_POST['newName'], 
        "price"=>$_POST['newPrice'], 
        "category"=>$_POST['newCategory'], 
        "stock"=>$_POST['newStock']
    ];
};

var_dump($_POST);
?>


<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <title>rec_tienda</title>
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
        <nav class="menu">
            <ul>
                <li><a href="rec_tienda.php?option=catalogo">Catálogo</a></li>
                <li><a href="rec_tienda.php?option=aniadirProducto">Añadir producto</a></li>
                <li><a href="rec_tienda.php?option=carrito">Carrito</a></li>
            </ul>
        </nav>
        <?php if($_GET['option']=='catalogo'){ ?>
            <form method="post">
                <table>
                    <tr>
                        <th>Identificador</th>
                        <th>Nombre</th>
                        <th>Precio</th>
                        <th>Seleccionar</th>
                    </tr>

                    <?php foreach($_SESSION['$arrrayProducts'] as $product){
                        echo(
                            '<tr>'.
                                '<td>'.$product['identification'].'</td>'.
                                '<td>'.$product['name'].'</td>'.
                                '<td>'.$product['price'].'</td>'.
                                '<td>'.'<input type="checkbox" id="arrayCheck[]" name="arrayCheck[]" value="'.$product['identification'].'"></td>'.
                            '<tr>'
                        );
                    };?>
                </table>
                <button type="submit" id="addToCart" name="addToCart">Añadir al carrito</button>
            </form>
        <?php } ?>
        <?php if($_GET['option']=='carrito'){ ?>
            <form method="post">
                <table>
                    <tr>
                        <th>Identificador</th>
                        <th>Nombre</th>
                        <th>Precio</th>
                    </tr>
                    <?php foreach($_SESSION['$arrrayCart'] as $pro){
                        echo(
                            '<tr>
                                <td>'.$pro['identification'].'</td>
                                <td>'.$pro['name'].'</td>
                                <td>'.$pro['price'].'</td>
                            </tr>'
                        );
                    } ?>
                </table>
                <button type="submit" id="deleteCart" name="deleteCart">Borrar carrito</button>
            </form>
        <?php } ?>
        <?php if($_GET['option']=='aniadirProducto'){ ?>
            <form method="post">
                <label for="newName">Nombre:</label>
                <input type="text" id="newName" name="newName">
                <br><br>
                <label for="newPrice">Precio:</label>
                <input type="number" id="newPrice" name="newPrice">
                <br><br>
                <label for="newCategory">Categoría:</label>
                <input type="text" id="newCategory" name="newCategory">
                <br><br>
                <label for="newStock">Stock:</label>
                <input type="number" id="newStock" name="newStock">
                <br><br>
                <button type="input" id="addToCatalog" name="addToCatalog">Añadir al catalogo</button>
            </form>
        <?php } ?>
    </body>
</html>