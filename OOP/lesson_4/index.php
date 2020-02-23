<?php
 error_reporting(-1);
 require_once 'classes/Car.php';

 function debug($data){
     echo '<pre>' . print_r($data, 1) . '</pre>';
 }

 $car1 = new Car('black',4,220,'Volvo');
 $car2 = new Car('black',4,180,'BMW');






echo $car1 -> getCarInfo();
echo $car2 -> getCarInfo();