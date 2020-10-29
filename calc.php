<?php
/*
 * Name: Azul Lanas
 * Date: October 7th 2020
 * Purpose: To write a simple server side application for a calculator
 */
require_once 'mustache/mustache/src/Mustache/Autoloader.php';
Mustache_Autoloader::register();

$m = new Mustache_Engine;

$header = file_get_contents('templates/header.html');
$body = file_get_contents('templates/result.html');
$footer = file_get_contents('templates/footer.html');

 if (!empty($_POST)) {
    if(!empty($_POST["num1"]) && !empty($_POST["num2"]) && !empty($_POST["oper"])){
        $n1 = $_POST['num1'];
        $n2 = $_POST['num2'];
        $oper = $_POST['oper'];
        $ans = "";
        

        trim($n1);
        trim($n2);
        trim($oper);

        if(!preg_match('/^[\d\.]+$/', $n1)){
            $n1 = 0;
        }

        if(!preg_match('/^[\d\.]+$/', $n2)){
            $n2 = 0;
        }

        $n1 = (float)$n1;
        $n2 = (float)$n2;

        switch($oper){
            case "sub":
                $n3 = $n1 - $n2;
                $ans = strval($n1) . " - " . strval($n2) . " = " . strval($n3);
                break;
            case "mul":
                $n3 = $n1 * $n2;
                $ans = strval($n1) . " * " . strval($n2) . " = " . strval($n3);
                break;
            case "div":
                $n3 = $n1 / $n2;
                $ans = strval($n1) . " / " . strval($n2) . " = " . strval($n3);
                break;
            default:
                $n3 = $n1 + $n2;
                $ans = strval($n1) . " + " . strval($n2) . " = " . strval($n3);
                break;
        
        }

        $headerData = ["pagetitle" => "Result Page"];
        $bodyData = ["name" => "Result", "msg" => "Your Result: " . $ans];
        $footerData = [
            "footertitle" => "Result Page", 
            "localtime" => date('l jS \of F Y h:i:s A')
        ];
        echo $m->render($header, $headerData) . PHP_EOL;
        echo $m->render($body, $bodyData) . PHP_EOL;
        echo $m->render($footer, $footerData) . PHP_EOL;

    } else {

        $headerData = ["pagetitle" => "Error Page"];
        $bodyData = ["name" => "Error", "msg" => "Please enter proper data into the Calculator."];
        $footerData = [
            "footertitle" => "Error Page", 
            "localtime" => date('l jS \of F Y h:i:s A') 
        ];

        echo $m->render($header, $headerData) . PHP_EOL;
        echo $m->render($body, $bodyData) . PHP_EOL;
        echo $m->render($footer, $footerData) . PHP_EOL;
    }
} else {
    
        $headerData = ["pagetitle" => "Error Page"];
        $bodyData = ["name" => "Error", "msg" => "Please enter proper data into the Calculator."];
        $footerData = [
            "footertitle" => "Error Page", 
            "localtime" => date('l jS \of F Y h:i:s A') 
        ];
        
        echo $m->render($header, $headerData) . PHP_EOL;
        echo $m->render($body, $bodyData) . PHP_EOL;
        echo $m->render($footer, $footerData) . PHP_EOL;
}

?>