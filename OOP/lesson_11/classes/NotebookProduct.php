<?php
require 'IGadget.php';

class NotebookProduct extends Product /* implements IGadget */
{
    public $cpu;

    public function __construct( $name, $price, $cpu ) {
        parent::__construct( $name, $price );
        $this->cpu = $cpu;
    }

    public function getProduct()
    {
        $out=parent::getProduct();
        $out .= "Процессор: {$this->cpu}<br>";
        return $out;
    }

    public function getCpu() {
        return $this->cpu;
    }

    public function addProduct($name, $price){
        var_dump($name);
        var_dump($price);
    }

    public function getCase(){

    }
}
