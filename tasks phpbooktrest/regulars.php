<?php
error_reporting(-1);

/* $numbers = [
    'bv345l',
    'cb437l',
    'notTru',
    '54blk7',
    'tu765l',
    'nm93lk',
    'bc345o',
];
//регулярное выражение
$regexp = '/[a-z]{2}[0-9]{3}[a-z]/';

foreach ( $numbers as  $value ) {
    $match = [];
//фyнкцыя записывает совпадение  в масив под 0-евым ключом
    if ( preg_match( $regexp, $value, $match ) > 0 ) {
        echo "$match[0] -  являеться автомобильным номером! <br>";
    } else {
        echo "$value - не являеться автомобильным номером! <br>";
    }
} */


// Правильные: 
/* $correctNumbers = [ 
    '84951234567',  '+74951234567', '8-495-1-234-567', 
    ' 8 (8122) 56-56-56', '8-911-1234567', '8 (911) 12 345 67', 
    '8-911 12 345 67', '8 (911) - 123 - 45 - 67', '+ 7 999 123 4567', 
    '8 ( 999 ) 1234567', '8 999 123 4567'
  ];
  
  // Неправильные: 
  $incorrectNumbers = [
    '02', '84951234567 позвать люсю', '849512345', '849512345678', 
    '8 (409) 123-123-123', '7900123467', '5005005001', '8888-8888-88',
    '84951a234567', '8495123456a', 
    '+1 234 5678901', // неверный код страны 
    '+8 234 5678901', // либо 8 либо +7 
    '7 234 5678901' // нет + 
  ];

  $regexp = "/([8|+7]?) ([0-9 -]+)?/";
//  $regexp ="/^((8|\\+7)[\\- ]? [\\(] )? (\\(?\\d{3}\\)?[\\- ]?)?[\\d\\- ]{7,10}/"; 

  foreach ( $correctNumbers as  $value ) {
    $match = [];
//фyнкцыя записывает совпадение  в масив под 0-евым ключом
    if ( preg_match( $regexp, $value, $match ) > 0 ) {
        echo "$match[0] -  Номер прошел валидацыю! <br>";
    } else {
        echo "$value - Номер не прошел валидацыю! <br>";
    }
 } */