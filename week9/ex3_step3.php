<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$file = "ex3_step3.xml";

$xml = simplexml_load_file($file) or die("Unable to load xml file!");

echo $xml->sin[0] . "<br>";
echo $xml->sin[1] . "<br>";
echo $xml->sin[2] . "<br>";
echo $xml->sin[3] . "<br>";
echo $xml->sin[4] . "<br>";
echo $xml->sin[5] . "<br>";
echo $xml->sin[6] . "<br>";

foreach($xml->sin as $sin) {
    echo $sin . "<br>";
}