<?php
error_reporting(-1);

require_once 'classes/Product.php';
require_once 'classes/BookProduct.php';
function debug($data){
    echo '<pre>' . print_r($data, 1) . '</pre>';
}

$book = new BookProduct('Три мушкетера', 20, 1000);

debug($book);

echo $book->getProduct();

$product = new Product('test',1);
debug($product);