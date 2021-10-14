<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title></title>
</head>
<style>
    .blue {
        background-color: lightskyblue;
        font-family: Calibri;

    }
    .header {
        color: white;
    }

    .body {
        font-weight: normal;
    }

    th{
        width: 1%;
    }
</style>
<body>
<?php

/*
 * ESTADO DE UNA VARIABLE
 */

$forHead = array('Contenido de $var','isset($var)','empty($var)','(bool) $var');
$valuesString = array("null;","0;","true","false",'"0";','"";','"foo";',"array( );");
$values = array(null,0,true,false,"0","","foo",array());

$output = '<table border="1" align="center" class="blue"><thead>';
//HEADER
$output .= '<tr>';

for ($i = 0; $i < count($forHead);$i++){
    $output .='<th class="header">'.$forHead[$i].'</th>';
}
$output .='</tr></thead><tbody>';

//body
//FILAS
for ($i = 0; $i < count($valuesString); $i++) {
    $output .= '<tr>';
    $output .= '<th class="body">$var = ' .$valuesString[$i]. "</th>";
    $output .= '<th class="body">' .set($values[$i]). "</th>";
    $output .= '<th class="body">' .empt($values[$i]). "</th>";
    $output .= '<th class="body">' .bul($values[$i]). "</th>";
    $output .= '</tr>';
}

//ultima fila
    $var = "hi";
    $output .= '<tr>';
    $output .= '<th class="body"> unset ($var); </th>';
    $output .= '<th class="body">' .unIs(). "</th>";
    $output .= '<th class="body">' .unEm(). "</th>";
    $output .= '<th class="body">' .unBool(). "</th>";
    $output .= '</tr>';


$output .= '</tbody></table>';
echo $output;

//funciones
function set($value)
{
    if (isset($value))
    {
        return "true";
    }
    else{
        return "false";
    }
}

function empt($value){
    if (empty($value))
    {
        return "true";
    }
    else{
        return "false";
    }
}

function bul($value)
{
    if ((bool)($value))
    {
        return "true";
    }
    else{
        return "false";
    }
}

function unIs(){
    if(var_dump(isset($a)))
    {
        return "true";
    }
    else
        {
        return "false";
        }
}

function unEm(){
    if(var_dump(empty($a)))
    {
        return "false";
    }
    else
    {
        return "true";
    }
}

function unBool(){
    if((bool)(var_dump(isset($a))))
    {
        return "true";
    }
    else
    {
        return "false";
    }
}

?>
</body>
</html>
