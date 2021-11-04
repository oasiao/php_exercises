<!DOCTYPE html>
<!--
Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHPWebPage.php to edit this template
-->
<html>
<head>
    <meta charset="UTF-8">
    <title></title>
</head>
<body>
<?php
$array = [1,3,4,5,2,2,4];
$output = "";
$noOrdenado = true;
$contador = 0;


$output .= "El array que hay que ordenar es el siguiente: {";
$arrayToString = implode(",", $array);
$output .= $arrayToString . '} <br>';

while($noOrdenado){

    for ($i = 0; $i < count($array)-1;$i++){
        if ($array[$i] > $array[$i+1]){
            $mayor = $array[$i];
            $menor = $array[$i+1];
            $array[$i] = $menor;
            $array[$i+1] = $mayor;
            $contador++;
        }
    }
    if ($contador == 0)
    {
        $noOrdenado = false;
    }
    else{
        $contador = 0;
    }

}

$output .= "Resultado: {";
$arrayToString = implode(",", $array);
$output .= $arrayToString . "} Ordenado!";
echo $output;
?>
</body>
</html>
