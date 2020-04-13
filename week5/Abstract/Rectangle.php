<?php

require_once "Polygon.php";

class Rectangle extends Polygon {

    public $width;
    public $height;

    public function getArea() {
        return $this->width * $this->height;
    }

    public function getNumberOfSide() {
        return 4;
    }
}
?>


