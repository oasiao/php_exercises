<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Agenda con sesion</title>
</head>
<body>

<?php
global $name,$phone;
$agenda = [];
$person = [];

if (isset($_GET['submit'])) {
   /* if(!isset($_SESSION['agenda'])) {
        //$backup = $_COOKIE['PHPSESSID'];
        //session_id($backup);*/
   session_start();
    $person = $_GET["person"];

    $agenda = $_SESSION['agenda'];


    if ($person[0] == "") {
        echo "No has introducido nombre! Vuelve a intentarlo.";
    } else {

        if ($person[1] == "") {
            //si  el campo telefono no tiene valor, borramos el contacto que coincida con el nombre introducido
            $agenda = delete($agenda, $person[0]);
        } else {
            /**
             * En caso contrario, cogemos los nuevos valores y las anadimos en la variable agenda
             */
            $agenda[$person[0]] = $person[1]; //cogemos los nuevos valores y las añadimos dentro de agenda
        }
    }
    displayForm($agenda);
    output($agenda);

} else {
    if (isset($_COOKIE['PHPSESSID']))
    {
        $backup = $_COOKIE['PHPSESSID'];
        session_start(); # load session data
        echo "before destroying:";
        print_r($_SESSION);
        echo '<br>';
        $_SESSION = []; # coge todas las sesiones
        session_destroy(); # close and remove session
        session_id($backup);
        echo "after destroying:";
        print_r($_SESSION);
        session_start();
    }
    displayForm($agenda);
}

function displayForm($agenda)
{
    ?>
    <h1>Agenda</h1>
    <form>
        <h5>Add your contact:</h5>
        <input type="text" name="person[]" placeholder="Name"/> <!--required="required"-->
        <input type="number" name="person[]" placeholder="Phone"/>
        <input type="submit" name="submit" value="Submit"/>
    </form>
    <?php

    $_SESSION['agenda'] = $agenda;
}

function output($agenda)
{
    $output = '<h2>Contacts</h2><table border="1px solid #ddd"><tr>';
    $output .= '<th style="height: 30px; width: 100px;">Name </th><th style="height: 30px; width: 100px;"> Phone </th></tr>';

    foreach ($agenda as $nombre => $tlf) {
        $output .= '<tr>';
        $output .= '<th style="font-weight: normal; height: 30px; width: 100px;">' . $nombre . '</th>';
        $output .= '<th style="font-weight: normal; height: 30px; width: 100px;">' . $tlf . '</th>';
        $output .= '</tr>';
    }

    $output .= '</table>';
    echo $output;
}
function delete($agenda, $name)
{
    /**
     * @var $contador tipo int
     */
    $contador = 0;

    foreach ($agenda as $nombre => $tlf) {
        /**
         * Recorremos el array $agenda y comprobamos si hay algun nombre dentro del array que coincida con
         * la variable $name para borrarlo
         */
        if ($name == $nombre) {
            unset($agenda[$nombre]); //hacemos un unset para borrar el contacto del array
            $contador++;
        }
    }
    /**
     * Si no hemos borrado ningun contacto, el valor del $contador sera 0 y por tanto, nos mostrara los siguientes
     * warnings:
     * 1. Hemos introducido un nombre nuevo.
     * 2. No hemos introducido un numero de telefono.
     */
    if ($contador == 0) { //si no borramos, mostramos un warning ya que no hacemos nada
        echo "WARNING! HAS INTRODUCIDO UN NOMBRE QUE NO SE ENCUENTRA EN LA AGENDA." . '<br>';
        echo "WARNING! NO HAS INTRODUCIDO NINGÚN NÚMERO DE TELÉFONO.";
    }
    return $agenda;
}

?>
</body>
</html>
