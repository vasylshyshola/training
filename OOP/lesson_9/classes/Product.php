<?php 

abstract class Product
{
    private $name;
    protected $price;

    private $discount = 0;

/*  public $public ='public';
    protected $protected= 'protected';
    private $private = 'private'; */



    public function __construct($name,$price)
    {
        $this->name = $name;
        $this->price = $price;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getPrice(){
        return $this->price -(($this->price / 100) * $this->discount);
    }

    public function getDiscount():int{
        return $this->discount;
    }

    public function setDiscount(int $discount){
        return $this->discount = $discount;
    }

    public function getProduct()
    {
        return "<hr><b> О товаре</b><br>
                Наименование:{$this->name}<br>
                Цена:{$this->getPrice()}<br>";
    }
}