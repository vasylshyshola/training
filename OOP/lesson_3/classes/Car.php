<?php
 
 class Car
{
   public $color;
   public $wheels = 4;
   public $speed = 180;
   public $brand;   

   public function getCarInfo(){
      return "<h3> О моем авто:</h3>
      Марка: {$this->brand} <br>
      Цвет: {$this->color} <br>
      Кол-во клдес: {$this->wheels} <br>
      год выпуска: {$this->year} <br>
      Скорость: {$this->speed} <br>";
     
   }

}