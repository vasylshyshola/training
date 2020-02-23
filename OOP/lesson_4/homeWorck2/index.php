<?php
error_reporting(-1);
require_once 'classes/WritingToFile.php';

$data = ' Hello, World!';

$writeFile1 = new WritingToFile(__DIR__ . '/data.txt');

$writeFile1->write($data);
$writeFile1->write($data);
$writeFile1->write($data);
$writeFile1->write($data);