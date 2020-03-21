<?php

class BookProduct extends Product {
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
}
