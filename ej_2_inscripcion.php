<?php
session_start();

if(!isset($_SESSION['arrayActivities'])){
    $_SESSION['arrayActivities']=[
        ["identificador"=>1, "nombre"=>"Robótica", "categoria"=>"Tecnologia", "plazas"=>4, "arrayStudents"=>[]],
        ["identificador"=>2, "nombre"=>"Programación", "categoria"=>"Tecnologia", "plazas"=>2, "arrayStudents"=>[]],
        ["identificador"=>3, "nombre"=>"Fotografía", "categoria"=>"Arte", "plazas"=>10, "arrayStudents"=>[]],
        ["identificador"=>4, "nombre"=>"Ajedrez", "categoria"=>"Recreación", "plazas"=>10, "arrayStudents"=>[]],
        ["identificador"=>5, "nombre"=>"Diseño 3D", "categoria"=>"Arte", "plazas"=>15, "arrayStudents"=>[]],
        ["identificador"=>6, "nombre"=>"Podcast", "categoria"=>"Recreación", "plazas"=>15, "arrayStudents"=>[]]
    ];
};

if(isset($_POST['check'])){
    var_dump($_POST);

    foreach($_POST['check'] as $num){
        foreach($_SESSION['arrayActivities'] as $act){
            if($act['identificador']==$num){
                $act['arrayStudents'][]=[$_POST['studentName'], $_POST['studentCourse']];
            };
        };
    };
};
?>

<!DOCTYPE php>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <title>ej_2_inscripcion</title>
    </head>
    <body>
        <?php if(!isset($_GET['identificador'])){ ?>
        <form method="post">
            <label for="studentName">Nombre y apellidos:</label>
            <input type="text" id="studentName" name="studentName">
            <br><br>
            <label for="studentCourse">Curso:</label>
            <input type="text" id="studentCourse" name="studentCourse">
            <br><br>
            <table>
                <tr>
                    <th>Codigo</th>
                    <th>Nombre</th>
                    <th>Apuntado</th>
                </tr>
            <?php
            foreach($_SESSION['arrayActivities'] as $act){
                echo(
                    '<tr>'.
                        '<th>'.'<a href="ej_2_inscripcion.php?identificador='.$act['identificador'].'">'.$act['identificador'].'</a>'.
                        '<th>'.$act['nombre'].'</th>'.
                        '<th><input type="checkbox" value="'.$act['identificador'].'" id="check[]" name="check[]"></th>'.
                    '</tr>'
                );
            };
            ?>
            </table>
            <button type="submit" id="enroll" name="enroll">Inscribirse</button>
        </form>
        <?php } ?>
        <?php if(isset($_GET['identificador'])){ 
            foreach($_SESSION['arrayActivities'] as $act){
                if($act['identificador']==$_GET['identificador']){
                    echo(
                        '<h1>'.$act['identificador'].' '.$act['nombre'].'</h1>'.
                        '<p>'.$act['categoria'].'</p>'.
                        '<p>'.$act['plazas'].'</p>'.
                        '<table>
                        <tr>
                            <th>Nombre</th>
                            <th>Curso</th>
                        </tr>'
                    );

                    if(isset($act['arrayStudents'])){
                        foreach ($act['arrayStudents'] as $stu) {
                            
                        };
                    };
                };
            };
        }; ?>
    </body>
</html>