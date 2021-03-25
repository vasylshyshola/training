<?php
//пример подключения к базе данных
$driver = 'mysql';
$host = 'localhost';
$db_name = 'test';
$db_user = 'root';
$db_pass = 'V1564942';
$charset = 'utf8';
$options = [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]; //а трибуты вывода ошибок для конструкцыи try catch

try {
    $pdo = new
    PDO("$driver:host=$host;dbname=$db_name;charset=$charset", $db_user, $db_pass, $options); //само подключение (создание екземпляра)
    if (isset($_COOKIE['page_visit'])) {
        setcookie('page_visit', ++$_COOKIE['page_visit'], time() + 5);
    } else {
        setcookie('page_visit', 1, time() + 5);
        $_COOKIE['page_visit'] = 1;
    }
    session_start();

} catch (PDOException $e) {
    die("Не вышло подключиться к базе данных!");
}

/* Константы , задающие режим получения данных
-PD0::FETCH_NUM  пронумерованный масив
-PDO::FETCH_ASSOC * асоцыативный, названия столбцов = ключи
-PDO:FETCH_BOTH одновременно и то и то. Параметр по умолчанию
-PDO::FETCH_OBJ * строка как обеки свойства = имена столбцов*/

//пример запроса

//$result = $pdo->query('SELECT * FROM dishes'); // возвращает обект

//$row= $result ->fetch(PDO::FETCH_ASSOC); //возвращает масив. каждый вызов одна строка

/* while ($row = $result->fetch(PDO::FETCH_ASSOC)) { //пример вывода всей инфы построчно
    echo 'Блюдо - '. $row['dish_name'] . ', цена - ' . $row['dish_price'] . '<br>';
} */


/* 
$rows = $result -> fetchAll(PDO::FETCH_ASSOC);//все сразу в виде многомерного масива. Все значения каждо строки таблицы как один елемент масива
echo '<pre>';
var_dump($rows);
echo'<\pre>'; */

//Пример помещения данных в таблицу
# ИМЕНОВАННЫЙ ПЛЕЙСХОЛДЕР

/* $sql = 'SELECT dish_name FROM dishes WHERE dish_price = :dish_price'; //запрос
$stmt = $pdo ->prepare($sql);//подготовка запроса
$params=[':dish_price' => '1.00'];//помещение масива с парпметрами в переменую для удобства
$stmt->execute($params); //выполнение запроса.

$rows = $stmt->fetchAll(PDO::FETCH_ASSOC); */
/* echo '<pre>';
var_dump($rows); */


#ПОЗИЦыОННЫЙ ПЛЕЙСХОЛДЕР
/* $sql_pos = 'SELECT dish_name FROM dishes WHERE dish_price = ?';
$stmt_pos = $pdo ->prepare($sql_pos);
$stmt_pos->execute(['1.00']);//всегда передавать масив
$rows_pos = $stmt_pos->fetchAll(PDO::FETCH_ASSOC);
echo '<pre>';
var_dump($rows_pos);  */