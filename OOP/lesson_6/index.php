<?php
 error_reporting(-1);
 require_once 'classes/Car.php';

 function debug($data){
     echo '<pre>' . print_r($data, 1) . '</pre>';
 }

 echo Car::$countCar;
 echo '<br>';

 $car1 = new Car('black',4,220,'Volvo');

 echo Car::$countCar;
 echo '<br>';

 $car2 = new Car('black',4,180,'BMW');



echo Car::getCount();
echo '<br>';


echo $car1->getCarInfo();
echo $car2->getCarInfo();
echo $car1->getProrotypeInfo();