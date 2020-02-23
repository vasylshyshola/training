<?php

error_reporting(-1);

$price = 39999;
$payment = 5000;
$homoCredit = [
    'procent' => 4,
    'commission' => 500,
    'bankName' => 'Homo Credit',
];

$softBank = [
    'procent' => 3,
    'commission' => 1000,
    'bankName' => 'Soft Bank',
];

$stravberryBank = [
    'procent' => 2,
    'commission' => 0,
    'extra charge' => 7777,
    'bankName' => 'Stravberry Bank',
];

function takingDecision($price, $payment, $procent, $commission, $extraCharge)
{
    $result = [];
    if (isset($extraCharge)) {
        $price += $extraCharge;
    }
    $month = 0;
    for ( $month = 0; $price > 0; $month++) {

        $overPaymant += (($price / 100) * $procent);
        //месячный процент
        $overPaymant += $commission;
        //комиссия банака

        $totalOverPayment += $overPaymant;
        //сумма общей переплаты

        $price += $overPaymant;

        $price -= $payment;
        $overPaymant = 0;

    }

    $result= compact('month', 'totalOverPayment');// помещаям переменные в масив с сохранением ключа  и значения

    return $result; //возвращаем результат вычслений
}

//функцыя для конвертацыи и вывода
function conclusion ($result, $price, $bankName){
    $years = round( $result['month']/12 );
    $month =  $result['month'] % 12;
    $finalPrice += $price;
    $finalPrice += round( $result['totalOverPayment'] );


    echo "Для погашения кредита в {$bankName}, eму понадобтлось {$years}год и {$month} месяц.Итоговая чумма стоставила {$finalPrice} р.<br> \r\n";
}

//сохраняем возвращаемый результат в масив
$resultHomoB = takingDecision($price, $payment, $homoCredit['procent'], $homoCredit['commission'], null);
$resultSoftB = takingDecision($price, $payment, $softBank['procent'], $softBank['commission'], null);
$resultStrB = takingDecision($price, $payment, $stravberryBank['procent'], $stravberryBank['commission'], $stravberryBank['extra charge']);

conclusion ($resultHomoB, $price, $homoCredit['bankName']);
conclusion ($resultSoftB, $price, $softBank['bankName']);
conclusion ($resultStrB, $price, $stravberryBank['bankName']);



