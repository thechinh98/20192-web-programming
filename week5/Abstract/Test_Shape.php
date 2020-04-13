<?php
function __autoload($class) {
    
    include(ucfirst($class) . ".php");   
}

$myCollection = array();
$r = new Rectangle;
$r->width = 5;
$r->height = 7;
$myCollection[] = $r;
unset($r);

$t = new Triangle;
$t->base = 4;
$t->height = 5;
$myCollection[] = $t;
unset($t);

$c = new Circle;
$c->radius = 5;
$myCollection[] = $c;
unset($c);

$c1 = new Color;
$c1->name = "blue";
$myCollection[] = $c1  ;
unset($c);

foreach ($myCollection as $s) {
    if ($s instanceof Shape) {
        print("Area: " . $s->getArea() . "<br>\n");
    }
    if ($s instanceof Polygon) {
        print("Side: " . $s->getNumberOfSide() . "<br>\n");
    }
    if ($s instanceof Color) {
        print("Color: $s->name<br>\n");
    }
    print("<br>\n");
}
?>


