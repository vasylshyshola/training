<?php
error_reporting( -1 );

require_once 'classes/I3d.php';

require_once 'classes/Product.php';
require_once 'classes/BookProduct.php';
require_once 'classes/NotebookProduct.php';



function debug( $data ) {
    echo '<pre>' . print_r( $data, 1 ) . '</pre>';
}

function offerCase( $product ) {
    echo "<p>Предлагаем чехол для гаджета {$product->getName()}</p>";
}

$book = new BookProduct( 'Три мушкетера', 20, 1000 );
$notebook = new NotebookProduct( 'Dell', 1000, 'Intel' );

offerCase( $notebook );

debug( $book );
var_dump($notebook instanceof IGadget);

class A {
};

class B extends A {
};



$a = new A;
$b = new B;

var_dump( $b instanceof A );
