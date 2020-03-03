<?php

error_reporting(-1);
mb_internal_encoding('utf-8');
 
$text = "ну что.      не смотрел еще black mesa.я собирался скачать  ,но все как-то некогда было.";
// Для тестов
// $text = 'roses are red,and violets are blue.whatever you do i'll keep it for you.';
// $text = 'привет.есть 2 функции,preg_split и explode ,не понимаю,в чем между ними разница.';
 
/* Делает первую букву в строке заглавной */
function makeFirstLetterUppercase($text) {
    return  'не работает';  /* .... */
}
 
/* исправляет текст */
function fixText($text) {
 
    /* ... */
 
}
 
$result = fixText($text);
echo "{$result}\n";