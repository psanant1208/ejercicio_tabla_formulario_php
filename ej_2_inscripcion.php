<?php
session_start();

$arrayActivities=[
    ["identificador"=>1, "nombre"=>"Robótica", "categoria"=>"Tecnologia", "plazas"=>30],
    ["identificador"=>2, "nombre"=>"Programación", "categoria"=>"Tecnologia", "plazas"=>30],
    ["identificador"=>3, "nombre"=>"Fotografía", "categoria"=>"Arte", "plazas"=>30],
    ["identificador"=>4, "nombre"=>"Ajedrez", "categoria"=>"Recreación", "plazas"=>30],
    ["identificador"=>5, "nombre"=>"Diseño 3D", "categoria"=>"Arte", "plazas"=>30],
    ["identificador"=>6, "nombre"=>"Podcast", "categoria"=>"Recreación", "plazas"=>30]
];
?>

<!DOCTYPE php>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <title>ej_2_inscripcion</title>
    </head>
    <body>
        <?php if(!isset($_GET['identificador'])){ ?>
        <form method="get">
            <label for="studentName">Nombre y apellidos:</label>
            <input type="text" id="studentName" name="studentName">
            <br><br>
            <label for="studentCourse">Curso:</lablel>
            <input type="text" id="studentCourse" name="studentCourse">
            <br><br>
            <table>
                <tr>
                    <th>Codigo</th>
                    <th>Nombre</th>
                    <th>Apuntado</th>
                </tr>
            <?php
            foreach($arrayActivities as $act){
                echo(
                    '<tr>'.
                        '<th>'.'<a href="ej_2_inscripcion.php?identificador='.$act['identificador'].'">'.$act['identificador'].'</a>'.
                        '<th>'.$act['nombre'].'</th>'.
                        '<th><input type="checkbox"></th>'.
                    '</tr>'
                );
            };
            ?>
            </table>
            <button id="enroll" name="enroll">Inscribirse</button>
        </form>
        <?php } ?>
        <?php if(isset($_GET['identificador'])){ 
            foreach($arrayActivities as $act){
                if($act['identificador']==$_GET['identificador']){
                    echo(
                        '<h1>'.$act['identificador'].' '.$act['nombre'].'</h1>'.
                        '<p>'.$act['categoria'].'</p>'.
                        '<p>'.$act['plazas'].'</p>'
                    );
                };
            };
        }; ?>
    </body>
</html>