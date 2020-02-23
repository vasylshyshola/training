<?php

error_reporting(-1);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <?php

//$light='yellow';

/* 
if ($light == 'green') {
    echo 'We may go';
}elseif ($light=='yellow') {
    echo 'We may ready';
}elseif($light=='rad') {
    echo 'We must stop';
} */


////////////////////////////////////////////////////////////////////////////
//next lesson



/* $i = 1;
while ($i<=10) {
  echo $i . "<br>";
  $i++;
} */

$i= 1;

echo '<table border="1" >';
while ($i <= 10) {
    echo "<tr>";
    $a=1;
    while ($a <= 3 ){
        echo "<td>Row = $i | Colm = $a</td>";
        $a++;
    }
    echo "</tr>";
    $i++;
}

echo '</table>';


?>
</body>
</html>