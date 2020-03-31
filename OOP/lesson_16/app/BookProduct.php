<?php

namespace app;

use wfm\interfaces\I3D;
use wfm\Product;

class BookProduct extends Product implements I3D
 {

    public $numPages;
    public $action1;
    public $action2;

    //    const TEST = 20;

    public function __get($name)
    {
        $name = ucfirst($name);
        $method = "get{$name}";
        if(method_exists($this,$method)){
            return $this->$method();
        }
    }

    public function __set($name, $valeu)
    {
        var_dump($name, $valeu);
    }
    public function __toString()
    {
        return $this->getProduct();
    }

    public function __construct( $name, $price, $numPages )
 {
        parent::__construct( $name, $price );
        $this->numPages = $numPages;
        $this->setDiscount( 5 );

    }

    public function test()
 {
        // TODO: Implement test() method.
    }

    public function getProduct()
 {
        $out = parent::getProduct();
        $out .= "Цена без скидки: {$this->price}<br>";
        $out .= "Кол-во страниц: {$this->numPages}<br>";
        $out .= "Скидка: {$this->getDiscount()}%<br>";
        return $out;
    }

    public function getNumPages()
 {
        return $this->numPages;
    }

    public function addProduct( $name, $price, $numPages = 0 )
 {
        // TODO: Implement addProduct() method.
        var_dump( $name );
        var_dump( $price );
        var_dump( $numPages );
    }

    public function doAction1()
 {
        echo $this->action1 = '<p>Выполнено действие 1</p>';
        return $this;
        //для последовательного вызова методов
    }

    public function doAction2()
 {
        echo $this->action2 = '<p>Выполнено действие 2</p>';
        return $this;
    }

}