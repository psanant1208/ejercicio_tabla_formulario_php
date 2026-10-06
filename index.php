<?php
$arrrayProducts=[
    ["identification"=>1, "name"=>"Teclado", "price"=>80, "category"=>"entrada", "stock"=>50],
    ["identification"=>2, "name"=>"Ratón", "price"=>60, "category"=>"entrada", "stock"=>48],
    ["identification"=>3, "name"=>"Monitor", "price"=>150, "category"=>"salida", "stock"=>35],
    ["identification"=>4, "name"=>"Webcam", "price"=>80, "category"=>"entrada", "stock"=>20],
    ["identification"=>5, "name"=>"Auriculares", "price"=>70, "category"=>"salida", "stock"=>62],
    ["identification"=>6, "name"=>"Alfombrilla", "price"=>15, "category"=>"complemento", "stock"=>100]
];
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
                <li><a href="#">Catálogo</a></li>
                <!-- Mostrar formulario para introducir los datos de un nuevo producto para el catálogo -->
                <li><a href="#">Añadir producto</a></li>
                <!--Mostrar cesta en la que habrá opciones para borrarla y comprar-->
                <li><a href="#">Ver cesta</a></li>
            </ul>
        </nav>
    </body>
</html>