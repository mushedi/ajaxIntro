<?php 
// Azul Lanas
// 10/28/2020
// Calculator page php file

require_once 'mustache/mustache/src/Mustache/Autoloader.php';
Mustache_Autoloader::register();

$m = new Mustache_Engine;

$header = file_get_contents("templates/header.html");
$body = file_get_contents("templates/calculator.html");
$footer = file_get_contents("templates/footer.html");

$headerData = ["pagetitle" => "Calculator Page"];
$calcData = ["name" => "Calculator Page"];
$footerData = [
    "footertitle" => "Calculator Page", 
    "localtime" => date('l jS \of F Y h:i:s A'),
    "script" => "src='js/main.js'"
];

echo $m->render($header, $headerData) . PHP_EOL;
echo $m->render($body, $calcData) . PHP_EOL;
echo $m->render($footer, $footerData) . PHP_EOL;




