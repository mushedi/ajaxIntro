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
    if(!empty($_POST["n1"]) && !empty($_POST["n2"]) && !empty($_POST["oper"])){
        $n1 = $_POST['n1'];
        $n2 = $_POST['n2'];
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
                break;
            case "mul":
                $n3 = $n1 * $n2;
                break;
            case "div":
                $n3 = $n1 / $n2;
                break;
            default:
                $n3 = $n1 + $n2;
                break;
        
        }
        printf($n3);

    } else {
    printf("Processing error, please make sure you enter proper data into the calculator.");
    }
} else {
    printf("Server error, please make sure you enter proper data into the calculator.");
}
?>