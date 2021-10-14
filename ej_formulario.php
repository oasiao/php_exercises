<!doctype html>
<!-- Ejemplo de formulario sin validación de campos,
-->
<html>
<head>
    <meta charset="UTF-8">
    <title>Sin validación</title>
</head>
<body>
<?php
// Comprobamos si se reciben datos del forumulario.
if (isset($_GET['submit'])) {
    echo "El formulario fue correctamente procesado";
    // Aquí procesaríamos el formulario.
} else {//
    displayForm();
}


function displayForm() {
    global $nombre, $edad, $email;
    ?>
    <h1>Registro de usuario</h1>
    <form>
        <input type = "text" name = "nombre"
               placeholder="Nombre" value = "<?php echo $nombre; ?>"/>
        <input type = "text" name = "edad"
               placeholder="Edad" value = "<?= $edad; ?>"/>
        <input type = "text" name = "email"
               placeholder="email" value = "<?= $email; ?>"/>
        <input type = "submit" name="submit"/>
    </form>
    <?php
}
?>
</body>
</html>