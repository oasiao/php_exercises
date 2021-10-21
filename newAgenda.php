<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Agenda</title>
</head>
<body>
<?php
/**
 * Practica DWES_C2P03_formulario agenda
 * @author Onika Kim Asiao Dumbrique
 * @version 1.0
 */
/**
 * Declaracion de la variable person de tipo array
 * @var $person type array
 */
$person = [];

/**
 * Declaracion de la variable person de tipo array
 * @var $agenda type array
 * aqui guardaremos los contactos introducidos anteriormente
 */
$agenda = [];

/**
 * Con esta condicion, comprobamos si el cliente ha hecho submit.
 * En caso contrario, se mostrara el formulario.
 */
if (isset($_GET['submit'])) {
    /**
     * Al hacer submit, guardamos en $person los nuevos valores (nombre y telefono) que el cliente introduce
     * en los inputs del formulario
     */
    $person = $_GET["person"]; //guardo la nueva persona en $person

    /**
     * Al hacer el primer submit, $_GET["personas"] no existe ya que todavia no le hemos pasado ningun valor.
     * Para evitar el warning que nos aparece, comprobamos que $_GET["personas"] existe.
     */
    if (isset($_GET["personas"])) {
        $agenda = $_GET["personas"]; //guardamos en $agenda todos los contactos guardados en los inputs hidden
    }

    /**
     * A continuacion, comprobamos que el input del nombre NO esta vacio. Si esta vacio, muestra una advertencia
     * porque que es un campo obligatorio.
     */
    if ($person[0] == "") {
        echo "No has introducido nombre! Vuelve a intentarlo."; //muestra mensaje si no ha introducido nombre
    } else {
        /**
         * Si el input del nombre no esta vacio, comprobamos si el campo del telefono esta vacio. Si esta vacio,
         * borramos el contacto del array.
         */
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

    /*
     * Despues de comprobar todos los campos y guardar el nuevo contacto, mostramos el formulario pasandole por
     * parametro la @var $agenda
     */
    displayForm($agenda); //mostramos el formulario y le pasamos por parametro todos los contactos

    /**
     * Con la siguiente funcion, mostramos la agenda con todos los contactos introducidos
     *
     */

    output($agenda); //mostramos la agenda con una tabla


} else {
    /**
     * Si el cliente todavia no ha hecho submit, mostrara el formulario
     */
    displayForm($agenda);

}

/**
 * funcion displayForm()
 * muestra el formulario y le pasamos por parametro los contactos que hemos guardado dentro de la variable $agenda.
 * De esta manera, podemos guardar los contactos en un input "hidden".
 * @param $agenda
 */

function displayForm($agenda)
{
    ?>
    <h1>Agenda</h1>
    <form>
        <h5>Add your contact:</h5>
        <input type="text" name="person[]" placeholder="Name"/> <!--required="required"-->
        <input type="number" name="person[]" placeholder="Phone"/>
        <?php
        /**
         * Por cada contacto que hay en la agenda, creamos un input de tipo hidden para no perder la información
         * ya que una vez que hacemos submit, la pagina actualiza y la informacion se pierde.
         * En "name" guardamos las claves del array y en "value" los valores del array, en nuestro caso, los nombres y
         * los telefonos de cada contacto, respectivamente.
         *
         */
        foreach ($agenda as $nombre => $tlf) {
            echo '<input type = "hidden" name="personas[' . $nombre . ']" value="' . $tlf . '"/>';
        }
        ?>
        <input type="submit" name="submit" value="Submit"/>
    </form>
    <?php
}

/**
 * function output() con esta funcion mostramos la agenda con las modificaciones que se hayan
 * hecho con el ultimo submit
 * @param $agenda
 */
function output($agenda)
{
    /**
     * @var $output type string
     */
    $output = '<h2>Contacts</h2><table border="1px solid #ddd"><tr>';
    $output .= '<th style="height: 30px; width: 100px;">Name </th><th style="height: 30px; width: 100px;"> Phone </th></tr>';
    /**
     * Recorremos la variable $agenda que pasamos por parametro y guardamos los valores en la variable $output
     */
    foreach ($agenda as $nombre => $tlf) {
        $output .= '<tr>';
        $output .= '<th style="font-weight: normal; height: 30px; width: 100px;">' . $nombre . '</th>';
        $output .= '<th style="font-weight: normal; height: 30px; width: 100px;">' . $tlf . '</th>';
        $output .= '</tr>';
    }
    $output .= '</table>';

    /**
     * Mostramos el contenido de la variable $output en el html
     */
    echo $output;
}


/**
 * function delete() borramos el contacto que coincida con el parametro $name del array $agenda y devolvemos
 * la agenda actualizada
 * @param $agenda
 * @param $name
 * @return mixed
 */
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

/**
 * Al tener un array asociativo, la funcion de actualizar no hace falta. Al introducir un nombre que ya existe
 * y un numero nuevo, actualiza el numero de telefono.
 */

?>
</body>
</html>