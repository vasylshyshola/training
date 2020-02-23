<?php
 error_reporting(-1);
 require_once 'classes/Car.php';

 function debug($data){
     echo '<pre>' . print_r($data, 1) . '</pre>';
 }

 $car1 = new Car();
 $car2 = new Car();
 //debug($car1);
 
 $car1 -> color ='black';
 $car1 -> brand = 'volvo';
 $car1 -> year = '2018';

 $car2 -> color ='red';
 $car2 -> brand = 'bmv';
 $car2 -> year = '2019';


 echo "<h3> О моем авто:</h3>
 Марка: {$car1->brand} <br>
 Цвет: {$car1->color} <br>
 Кол-во клдес: {$car1->wheels} <br>
 год выпуска: {$car1->year} <br>
 Скорость: {$car1->speed} <br>";

 //debug($car1);
 //debug($car2);