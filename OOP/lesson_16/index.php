<?php

use app\ {BookProduct, NotebookProduct, A, B};
use wfm\interfaces\ {IGadget, I3d};

require_once __DIR__ . '/vendor/autoload.php';

error_reporting( -1 );

function debug( $data ) {
    echo '<pre>' . print_r( $data, 1 ) . '</pre>';
}

function offerCase( IGadget $product ) {
    echo "<p>Предлагаем чехол для гаджета {$product->getName()}</p>";
}

$book = new BookProduct( 'Три мушкетера', 20, 1000 );
$notebook = new NotebookProduct( 'Dell', 1000, 'Intel' );

echo $book->name;
debug($book);


/* echo $book->getProduct(); */

//echo $book;// вызов магического метода toString()