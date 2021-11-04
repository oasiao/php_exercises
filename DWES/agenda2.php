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

global $nombre, $tlf, $contacts;
$personas = [];
$person = [];
if (isset($_GET['submit'])) {
    $person = $_GET["person"]; //guardo la nueva persona
    $personas[$person[0]] = $person[1]; //añado la nueva persona
    displayForm($personas); //se lo paso al input hidden
    foreach ($personas as $nombre => $tlf) {
        echo $nombre . ":" . $tlf;
    }
} else {
    displayForm("");
}

function displayForm($personas)
{
    ?>
    <h1>Agenda</h1>
    <form>
        <input type="text" name="person[]" placeholder="Name"/>
        <input type="number" name="person[]" placeholder="Phone"/>
        <input type="hidden" name="form" value="<?= $personas ?>"/>
        <input type="submit" name="submit" value="Submit"/>
    </form>
    <h2>Contacts</h2>
    <?php
}

?>
</body>
</html>
