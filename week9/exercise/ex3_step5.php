<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$file = "ex3_step5.xml";

$xml = simplexml_load_file($file) or die("Unable to load XML file!");

foreach($xml->xpath('//desc') as $desc) {
    echo $desc . "<br>";
}

echo "<h1>Quantity > 1: </h1>" . "<br>";

foreach($xml->xpath('//item[quantity > 1]/desc') as $desc) {
    echo $desc . "<br>";
}