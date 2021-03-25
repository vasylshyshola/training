<?php

require_once 'db.php';


$login = trim($_POST['login']);
$pwd = trim($_POST['pwd']);

if (!empty($login) && !empty($pwd)) {

    //проверка существования пользователя
    $sql_check= ' SELECT  EXISTS ( SELECT login  FROM users  WHERE login = :login)';

     if (isset($pdo)) {
        $stmt_check = $pdo->prepare($sql_check);
    }
     $stmt_check -> execute([':login'=>$login]);

     if($stmt_check->fetchColumn()){
         die('Пользователь с таким именем уже существует!');
     }


    $pwd = password_hash($pwd, PASSWORD_DEFAULT);

    $sql = 'INSERT INTO users(login,password) VALUE(:login,:pwd)';

    $params = ['login' => $login, 'pwd' => $pwd];

    if (isset($pdo)) {
        $stmt = $pdo->prepare($sql);
    }
    $stmt->execute($params);

    echo 'Вы успешно зарегистрировались!';

} else {
    echo 'Заполните все поля!';
}