<?php
session_start();
//Inicia la session

$arrayPersonas=[
    ["codigo"=>1, "nombre"=>"Pablo", "apellidos"=>"Sancho Antúnez", "edad"=>22, "profesion"=>"Ninguna"],
    ["codigo"=>2, "nombre"=>"Trevor", "apellidos"=>"Belmont", "edad"=>23, "profesion"=>"Cazador"],
    ["codigo"=>3, "nombre"=>"Paco", "apellidos"=>"Paquez", "edad"=>52, "profesion"=>"Carpintero"],
];

//Comprueba si $_SESSION['arrayPersonas'] tiene algo, y si es así hace que 
//$arrayPersonas sea igual a$_SESSION['arrayPersonas']
if(isset($_SESSION['arrayPersonas'])){
    $arrayPersonas=$_SESSION['arrayPersonas'];
};

//Declara la variable que vamos a usar, para que ho haya error, con 
//sus campos vacios
$personaEditar=["codigo"=>"", "nombre"=>"", "apellidos"=>"", "edad"=>"", "profesion"=>""];

//Comprueba si en la url hay una variable código y si es así asigna 
//los datos de la persona con ese codigo en la variable $personaEditar
if(isset($_GET['codigo'])){
    foreach($arrayPersonas as $persona){
        if($persona['codigo']==$_GET['codigo']){
            $personaEditar=$persona;
        };
    };
};

if(isset($_POST['codigo'])){
    for($i=0; $i<count($arrayPersonas); $i++){
        if($arrayPersonas[$i]['codigo']==$_POST['codigo']){
            $arrayPersonas[$i]['nombre']=$_POST['nombre'];
            $arrayPersonas[$i]['apellidos']=$_POST['apellidos'];
            $arrayPersonas[$i]['edad']=$_POST['edad'];
            $arrayPersonas[$i]['profesion']=$_POST['profesion'];
        };
    };

    //Una vez realizado el cambio en $arrayPersonas hace que $_SESSION['arrayPersonas']
    //sea igual a este
    $_SESSION['arrayPersonas'] = $arrayPersonas;
};
?>


<!DOCTYPE php>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <title>ej_tabla_formulario</title>
    </head>
    <body>
        <table>
            <tr>
                <th>CÓDIGO</th>
                <th>NOMBRE</th>
                <th>APELLIDOS</th>
                <th>EDAD</th>
                <th>PROFESIÓN</th>
            </tr>
            <!-- 
            Recorre el $arrayPersonas y va creando filas y celdas con los datos de caca una
            Además añade el codigo como un enlace que al pulsarlo manda el codigo a la url 
            -->
            <?php
            foreach($arrayPersonas as $persona){
                echo(
                    '<tr>'.
                    '<th>'.'<a href="ej_tabla_formulario.php?codigo='.$persona['codigo'].'">'.$persona['codigo'].'</a>'.'</th>'.
                    '<th>'.$persona['nombre'].'</th>'.
                    '<th>'.$persona['apellidos'].'</th>'.
                    '<th>'.$persona['edad'].'</th>'.
                    '<th>'.$persona['profesion'].'</th>'.
                    '</tr>'
                );
            };
            ?>
        </table>
        <?php if(!isset($_GET['codigo'])){?>
        <form method="">
            <button name="add" type="submit">Añadir</button>
        </form>
        <?php }?>
        <br><br>
        <!--
        Indica que el formulario ha de llamar al método post al pulsar el boton submit y los datos se guardaran en $_POST
        -->
        <form method="post">
            <div>
                <!--
                Pone el valor del codigo de $personaEditar en un imput oculto
                -->
                <input type="hidden" id="codigo" name="codigo" value="<?php echo($personaEditar['codigo'])?>">
            </div>
            <div>
                <label for="nombre">Nombre:</label>
                <!--
                Pone cada dato de la variable $personaEditar en el value de su respectivo imput
                -->
                <input type="text" id="nombre" name="nombre" value="<?php echo($personaEditar['nombre'])?>">
            </div>
            <div>
                <label for="apellidos">Apellidos:</label>
                <input type="text" id="apellidos" name="apellidos" value="<?php echo($personaEditar['apellidos'])?>">
            </div>
            <div>
                <label for="edad">Edad:</label>
                <input type="text" id="edad" name="edad" value="<?php echo($personaEditar['edad'])?>">
            </div>
            <div>
                <label for="profesion">Profesión:</label>
                <input type="text" id="profesion" name="profesion" value="<?php echo($personaEditar['profesion'])?>">
            </div>
            <button name="modify" type="submit">Modificar</button>
        </form>
    </body>
</html>