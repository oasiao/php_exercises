<!DOCTYPE html>
<!--
Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHPWebPage.php to edit this template
-->
<html xmlns="http://www.w3.org/1999/html">
<head>
    <meta charset="UTF-8">
    <title>Agenda</title>
</head>
<body>
<?php
// Comprobamos si se reciben datos del forumulario.
static $output='';

if (isset($_GET['submit'])) {
    displayForm();
    showingValues($output);

    // Aquí procesaríamos el formulario.
} else {//
    displayForm();
}

function displayForm() {
    global $nombre, $phone;
    ?>
    <h1>Agenda</h1>
    <form>
        <input type = "text" name = "nombre" placeholder="Name" value = "<?php echo $nombre; ?>"/>
        <input type = "number" name = "phone" placeholder="Phone" value = "<?= $phone; ?>"/>
        <input type = "submit" name="submit" value="Submit"/>
    </form>
    <h2>Contacts</h2>
    <?php
}

function showingValues($output){
    $output .= $_GET['nombre'] . " " . $_GET['phone'];
    echo $output;
}
?>
</body>
</html>
