<!DOCTYPE html>
<!--
Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHPWebPage.php to edit this template
-->
<html>
<head>
    <meta charset="UTF-8">
    <title>Agenda con array</title>
</head>
<body>
<?php
$person =[];
$agenda = [];
if (isset($_GET['submit'])) {
    $person = $_GET["person"]; //guardo la nueva persona
    //al primer submit, $agenda no tiene nada ya que todavia no le hemos pasado los primeros valores
    //por eso da un warning
    if ($_GET["personas"] !== NULL){ //NO ME FUNCIONA
        $agenda = $_GET["personas"]; //cogemos todos los valores anteriores
    }

    if ($person[1] == ""){
        $agenda = eliminar($agenda,$person[0]);
    }
    else{
        //cogemos los nuevos valores y las añadimos dentro de agenda
        $agenda[$person[0]]=$person[1];
    }

    //muestro el formulario pasandole por parámetro la agenda
    displayForm($agenda);

    //recorro la agenda para mostrarlo en pantalla
    output($agenda);
}
else {
    displayForm($agenda);

}

function displayForm($agenda)
{
    ?>
    <h1>Agenda</h1>
    <form>
        <input type = "text" name = "person[]" placeholder="Name"/>
        <input type = "number" name = "person[]" placeholder="Phone"/>
        <?php
        foreach ($agenda as $nombre => $tlf){
            echo '<input type = "hidden" name="personas['.$nombre.']" value="'.$tlf.'"/>';
        }
        ?>
        <input type = "submit" name="submit" value="Submit"/>
    </form>
    <h2>Contacts</h2>
    <?php
}

function output($agenda){

    //TODO MEJORAR EL RESULTADO
    foreach ($agenda as $nombre => $tlf){
        echo $nombre. ":" .$tlf.'<br>';
    }
}

function eliminar($agenda, $name){
    //TODO ELIMINAR
    foreach ($agenda as $nombre => $tlf){
        if ($name == $nombre){
            unset($agenda[$nombre]);
        }
    }

    return $agenda;
}

//EL REPLACE YA ESTA HECHO (AUTOMATICAMENTE) AL HACER KEY:VALUE

?>
</body>
</html>