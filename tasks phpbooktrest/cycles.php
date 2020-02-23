<?php
error_reporting ( -1 );
// таблица умножения

/* echo "<table border ='1'";
for ( $first = 1; $first <= 9; $first++ ) {
    echo '<tr>';
    for ( $second = 1; $second <= 9; $second++ ) {

        $result = ( $first * $second );
        echo"<td> {$first} x {$second} = {$result} <br></td>";
    }
    echo '</tr>';
}

echo '</table>';
*/

//подсчетсколько лет нужно до милиона + 10% каждый год.

/* $years = 16;
$money = 10000;
$neadMoney = 1000000;
for ( $money; $money <= $neadMoney ; $money += ( $money /10 ) ) {

    $years++;
}
echo "Вам удет {$years} года, когда вы насобираете свой {$neadMoney}";
*/

//айфон в кредит . 40000 на +3% и 5000 р каждый месяц

$sumOfCradit = 1000;
$finalPrice= $sumOfCradit;
$payment = 5000; 
$monthProcent = 3;
$comission = 1000;


for (; $sumOfCradit > 0 ; $month++ ) {
    $overPaymant += (($sumOfCradit/100) * $monthProcent);//месячный процент
    $overPaymant += $comission; //комиссия банака

    $totalOverPayment += $overPaymant;//сумма общей переплаты

    $sumOfCradit += $overPaymant; 
    $sumOfCradit -= $payment;
    $overPaymant = 0;
    
}
 
 $years = round($month/12);
 $month = $month % 12;
 $finalPrice += round($totalOverPayment);
echo "Ему понадобтлось {$years}год и {$month} месяц.Итоговая чумма стоставила {$finalPrice} р. ";