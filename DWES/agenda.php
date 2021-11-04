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

global $nombre,$tlf,$output,$contacts;

if (isset($_GET['submit'])) {
    displayForm(showingOutput());
    echo showingOutput();
}

else {
    displayForm("");
}

function displayForm($hidden)
{
    ?>
    <h1>Agenda</h1>
    <form>
        <input type = "text" name = "name" placeholder="Name"/>
        <input type = "number" name = "phone" placeholder="Phone"/>
        <input type = "hidden" name = "form" value = "<?= $hidden?>"/>
        <input type = "submit" name="submit" value="Submit"/>

    </form>
    <h2>Contacts</h2>
<?php
}

function showingOutput(){
    $nombre = $_GET['name'];
    $tlf = $_GET['phone'];
    $output = $_GET['form'];
    $contacts = $output . $nombre . " " . $tlf . '<br>';
    return $contacts;

}
?>
</body>
</html>