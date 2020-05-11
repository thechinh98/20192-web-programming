<?php

$file = "pet.xml";

$xml = simplexml_load_file($file) or die("Unable to load xml file!");

echo "Name: " . $xml->name . "<br>";
echo "Age: " . $xml->age . "<br>";
echo "Species: " . $xml->species . "<br>";
echo "Parents: " . $xml->parents->mother . " and " . $xml->parents->father . "<br>";

// modify xml

$xml->name = "Sammy Snail";
$xml->age = 4;
$xml->species = "snail";
$xml->parents->mother = "Sue Snail";
$xml->parents->father = "Sid Snail";

file_put_contents($file, $xml->asXML());