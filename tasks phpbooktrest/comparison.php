<?php
error_reporting (-1);

$PlayerCast1 = mt_rand('1','6'); //бросок игрока
$PlayerCast2 = mt_rand('1','6');//бросок игрока

$compCast1= mt_rand('1','6');//бросок компютера
$compCast2= mt_rand('1','6');//бросок компютера

echo "У игрока выпало {$PlayerCast1} и {$PlayerCast2} <br>У компютера выпало {$compCast1} и {$compCast2} <br> ";
//находим сумму чисел

$playerSum = ($PlayerCast1 + $PlayerCast2);
$compSum = ($compCast1 + $compCast2);

if(($PlayerCast1 == $PlayerCast2) && ($compCast1 == $compCast2)) {
    echo "Оба выбросили  2 одинаковых числа, это большая удача! <br>";
exit;
}

if ($compSum > $playerSum) {
    $dif = ($compSum - $playerSum);
    echo "Компютер выиграл , опередив игрока на {$dif}! <br>";
}elseif ($playerSum > $compSum) {
    $dif = ($playerSum - $compSum);
    echo "Игрок выиграл , опередив компьютер на {$dif}! <br>";
}elseif ($compSum == $playerSum) {
    echo "Ничья, стоит попробовать еще! <br>";
}