<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title></title>
</head>
<body>
<table border="1" align="center">
    <?php
    echo "<tr>";
    for ($i="0"; $i<=12; $i++){
        echo "<th>";
        echo $i;
        echo "</th>";
    }
    echo "</tr>";
    for ($j = 1; $j <=12; $j++){
        echo "<tr>";
        echo "<th>";
        echo $j;
        echo "</th>";
        for ($k=1; $k<=12; $k++){
            $multiply=$j*$k;
            echo "<td>";
            echo $multiply;
            echo "</td>";
        }
        echo "</tr>";
    }
    ?>
</table>
</body>
</html>
