<?php
require_once 'classes/I3d.php';// должно работать при обявлении в index.php но почему то не работает

class BookProduct extends Product implements I3d 
{
    public $pages;

    public function __construct( $name, $price, $pages ) {
        parent::__construct( $name, $price );
        $this->pages = $pages;
        $this->setDiscount(5);
    }

    public function getProduct()
    {
        $out = parent::getProduct();
        $out .="Цена без скидки: {$this->price}<br>";
        $out .= "Количество страниц: {$this->pages}<br>";
        $out .= "Скидка:{$this->getDiscount()}%<br>";
        return $out;
    }

    public function getPages() {
        return $this->pages;
    }

    public function addProduct($name, $price){
        var_dump($name);
        var_dump($price);
    }

    public function test(){
      
    }
}
