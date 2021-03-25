<?php
//ловим исключение при создании прдключения к базе данных
try {
    $db = new PDO('mysql:host=localhost;dbname=test','root','V1564942');
    //дальше идут атрибутф
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $q= $db->exec(" INSERT INTO dishes (dish_name, dish_price , is_spicy)
                            VALUE ('Sesame Seed Puff', 2.50 , 0)");
    print $q;

    // создание таблицы -CREATE TABLE dishes(
    //                            dish_id int,
    //                            dish_name varchar (255),
    //                            dish_price decimal (4,2),
    //                            is_spicy int)
    //DROP TABLE dishes - команда для удаления таблицы

}catch (PDOException $exception) {
    //выводим сообщениепри ошыбке без остановки программы
    print "Couldn't insert a row: " . $exception->getMessage();
}
//способ для проверкии водимых данных на допустимочть и наличие спец символов
//$stmt = $db->prepare('INSERT INTO dishes (dish_name, price, is_spicy)
//VALUES (?,?,?)');
//$stmt->execute(array($_POST['new_dish_name'], $_POST['new_price'],
//$_POST('is_spicy']));