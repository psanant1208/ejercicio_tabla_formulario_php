<?php
session_start();

//Mostrar un desplegabele con tres idiomas y dependiendo del seleccionado
//que se muestre un saludo en un idioma u otro

if(isset($_POST['language'])){
    if($_POST['language']=='espaniol'){
        echo("Hola");
    }
    elseif($_POST['language']=='ingles'){
        echo("Hello");
    }
    elseif($_POST['language']=='frances'){
        echo("Bonjour");
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
        <form method="post">
            <label for="language">IDIOMA: </label>
            <select id="language" name="language">
                <option value="espaniol">Español</option>
                <option value="ingles">Inglés</option>
                <option value="frances">Frances</option>
            </select>
            <button name="saludar" type="submit">Salúdame</button>
        </form>
    </body>
</html>