<?php
session_start();

if(!isset($_SESSION['arrayRooms'])){
    $_SESSION['arrayRooms']=[
        ["codigo"=>1, "nombre"=>"Sala de reuniones", "tipo"=>"Trabajo", "capacidad"=>4, "arrayReservas"=>[]],
        ["codigo"=>2, "nombre"=>"Sala de ocio", "tipo"=>"Alternativa", "capacidad"=>6, "arrayReservas"=>[]],
        ["codigo"=>3, "nombre"=>"Sala de formación", "tipo"=>"Trabajo", "capacidad"=>8, "arrayReservas"=>[]],
        ["codigo"=>4, "nombre"=>"Sala de audiciones", "tipo"=>"Alternativa", "capacidad"=>10, "arrayReservas"=>[]]
    ];
};

var_dump($_POST);
?>

<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <title>rec_inscripcion</title>
        <link rel="stylesheet" href="">
    </head>
    <body>
        <?php if(!isset($_GET['codigo'])){ ?>
        <form method="post">
            <table>
                <tr>
                    <th>Código</th>
                    <th>Nombre</th>
                    <th>Inscrivir</th>
                </tr>
                <?php foreach($_SESSION['arrayRooms'] as $room){
                    echo(
                        '<tr>
                            <td><a href="rec_inscripcion.php?codigo='.$room['codigo'].'">'.$room['codigo'].'</a></td>
                            <td>'.$room['nombre'].'</td>
                            <td><input type="checkbox" value="'.$room['codigo'].'" id="arrayCheck[]" name="arrayCheck[]"></td>
                        </tr>'
                    );
                } ?>
            </table>
            <br>
            <label for="personName">Nombre:</label>
            <input type="text" id="personName" name="personName">
            <br><br>
            <label for="personName">Departamento:</label>
            <input type="text" id="personDep" name="personDep">
            <br><br>
            <button type="submit" id="enroll" name="enroll">Enviar</button>
        </form>
        <?php } ?>
        <?php if(!isset($_GET['codigo'])){
        '<h1>'...'</h1>'
        } ?>
    <body>
</html>