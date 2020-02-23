<?php 

error_reporting(-1);
require_once 'classes/SaveData.php';

$file = new SaveData( __DIR__ . '/data.txt');
$file ->write('строка-1');
$file ->write('строка-2');
$file ->write('строка-3');
$file ->write('строка-4');
