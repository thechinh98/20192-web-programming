<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$str = <<< XML
<?xml version="1.0"?>
<shapes>
        <shape type="circle" radius="2" />
        <shape type="rectangle" length="5" width="2" />
        <shape type="square" length="7" />
</shapes>
XML;

$xml = simplexml_load_string($str) or die("Unable to load XML string!");

foreach($xml->shape as $shape) {
    if($shape["type"] == "circle") {
        $area = pi() * $shape["radius"] * $shape["radius"];
    } else if($shape["type"] == "rectangle") {
        $area = $shape["length"] * $shape["width"];
    } else if($shape["type"] == "square") {
        $area = $shape["length"] * $shape["length"];
    }
    echo $area . "<br>";
}