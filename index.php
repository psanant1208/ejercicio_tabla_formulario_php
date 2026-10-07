<?php
session_start();

$arrrayProducts=[
    ["identification"=>1, "name"=>"Teclado", "price"=>80, "category"=>"entrada", "stock"=>50],
    ["identification"=>2, "name"=>"Ratón", "price"=>60, "category"=>"entrada", "stock"=>48],
    ["identification"=>3, "name"=>"Monitor", "price"=>150, "category"=>"salida", "stock"=>35],
    ["identification"=>4, "name"=>"Webcam", "price"=>80, "category"=>"entrada", "stock"=>20],
    ["identification"=>5, "name"=>"Auriculares", "price"=>70, "category"=>"salida", "stock"=>62],
    ["identification"=>6, "name"=>"Alfombrilla", "price"=>15, "category"=>"complemento", "stock"=>100]
];

$actualProduct = null;

if(isset($_GET['identification'])){
    foreach($arrrayProducts as $pro){
        if($pro['identification']==$_GET['identification']){
            $actualProduct['identification']=$pro['identification'];
            $actualProduct['name']=$pro['name'];
            $actualProduct['price']=$pro['price'];
            $actualProduct['category']=$pro['category'];
            $actualProduct['stock']=$pro['stock'];
        };
    };
};

$maxId = 0;

foreach($arrrayProducts as $pro){
    if($pro['identification']>$maxId){
        $maxId=$pro['identification'];
    };
};
?>

<!DOCTYPE php>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <title>saludo_idiomas</title>
    </head>
    <body>
        <nav class="menu">
            <ul>
                <!-- Mostrar tabla con id del producto, nombre, check e imput number -->
                <li><a href="index.php?option=catalogo">Catálogo</a></li>
                <!-- Mostrar formulario para introducir los datos de un nuevo producto para el catálogo -->
                <li><a href="index.php?option=aniadir">Añadir producto</a></li>
                <!--Mostrar cesta en la que habrá opciones para borrarla y comprar-->
                <li><a href="#">Cesta</a></li>
            </ul>
        </nav>
        <?php if((!isset($_GET['option']) || $_GET['option']=='catalogo') && !isset($_GET['identification'])){ ?>
            <table>
                <tr>
                    <th>Identificador</th>
                    <th>Nombre</th>
                </tr>
                <?php
                foreach($arrrayProducts as $pro){
                    echo(
                        '<tr>'.
                            '<th>'.'<a href="index.php?identification='.$pro['identification'].'">'.$pro['identification'].'</a>'.'</th>'.
                            '<th>'.$pro['name'].'</th>'.
                        '</tr>'
                    );
                };
                ?>
            </table>
        <?php } ?>
        <?php if(isset($_GET['identification'])){ ?>
            <table>
                <tr>
                    <th>Identificador</th>
                    <th>Nombre</th>
                    <th>Precio</th>
                    <th>Categoría</th>
                    <th>Stock</th>
                </tr>
                <tr>
                    <?php
                    echo(
                        '<th>'.$actualProduct['identification'].'</th>'.
                        '<th>'.$actualProduct['name'].'</th>'.
                        '<th>'.$actualProduct['price'].'</th>'.
                        '<th>'.$actualProduct['category'].'</th>'.
                        '<th>'.$actualProduct['stock'].'</th>'
                    );
                    ?>
                </tr>
            </table>
        <?php } ?>
        <?php if($_GET['option']=='aniadir'){ ?>
            <form >
                <div>
                    <input type="hidden" id="newIden" name="newIden" value="<?php echo($maxID+1) ?>">
                    <br><br>
                    <label for="newName">Nombre:</label>
                    <input type="text" id="newName" name="newName">
                    <br><br>
                    <label for="newPrice">Precio:</label>
                    <input type="text" id="newPrice" name="newPrice">
                    <br><br>
                    <label for="newCat">Categoría:</label>
                    <input type="text" id="newCat" name="newCat">
                    <br><br>
                    <label for="newStock">Stock:</label>
                    <input type="text" id="newStock" name="newStock">
                    <br><br>
                    <button name="add" type="submit">Añadir</button>
                </div>
            </form>
        <?php } ?>
    </body>
</html>