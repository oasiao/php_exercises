<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Agenda</title>
</head>
<body>
<?php
/**
 * Definimos las variables como array que utilizaremos a continuacion
 */

/**
 * @var $person Aqui guardaremos los nuevos valores (nombre y telefono) que el cliente introducira
 */
$person =[];
$agenda = [];
if (isset($_GET['submit'])) {
    $person = $_GET["person"]; //guardo la nueva persona
    //al primer submit, $agenda no tiene nada ya que todavia no le hemos pasado los primeros valores
    //por eso da un warning

    if(isset($_GET["personas"])){
        $agenda = $_GET["personas"];
    }

    if ($person[0]==""){
        echo "No has introducido nombre!";
    }
    else{

        if ($person[1] == ""){
            $agenda = delete($agenda,$person[0]);
        }
        else{
            //cogemos los nuevos valores y las añadimos dentro de agenda
            $agenda[$person[0]]=$person[1];
        }

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
        <h5>Add your contact:</h5>
        <input type = "text" name = "person[]" placeholder="Name" /> <!--required="required"-->
        <input type = "number" name = "person[]" placeholder="Phone"/>
        <?php
        foreach ($agenda as $nombre => $tlf){
            echo '<input type = "hidden" name="personas['.$nombre.']" value="'.$tlf.'"/>';
        }
        ?>
        <input type = "submit" name="submit" value="Submit"/>
    </form>
    <?php
}

function output($agenda){
    //TODO MEJORAR EL RESULTADO ✅

    $output = '<h2>Contacts</h2><table border="1px solid #ddd"><tr>';
    $output .= '<th style="height: 30px; width: 100px;">Name </th><th style="height: 30px; width: 100px;"> Phone </th></tr>';

    foreach ($agenda as $nombre => $tlf){
        $output .= '<tr>';
        $output .= '<th style="font-weight: normal; height: 30px; width: 100px;">' . $nombre . '</th>';
        $output .= '<th style="font-weight: normal; height: 30px; width: 100px;">' .$tlf.'</th>';
        $output .= '</tr>';
    }
    $output .= '</table>';

    echo $output;
}




function delete($agenda, $name){
    $contador = 0;
    foreach ($agenda as $nombre => $tlf){
        if ($name == $nombre){
            unset($agenda[$nombre]);
            $contador++;
        }
    }
    if ($contador == 0){
        echo "WARNING! HAS INTRODUCIDO UN NOMBRE QUE NO SE ENCUENTRA EN LA AGENDA." . '<br>';
        echo "WARNING! NO HAS INTRODUCIDO NINGÚN NÚMERO DE TELÉFONO.";
    }
    return $agenda;
}

//EL REPLACE YA ESTA HECHO (AUTOMATICAMENTE) AL HACER KEY:VALUE

?>
</body>
</html>