<?php

require_once 'Polygon.php';

class Triangle extends Polygon {

    public $base;
    public $height;

    public function getArea() {
        return $this->base * $this->height / 2;
    }

    public function getNumberOfSide() {
        return 3;
    }

}
?>


