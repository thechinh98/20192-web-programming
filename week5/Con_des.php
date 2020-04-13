<html>
    <head><title></title></head>
    <body>
        <?php

        class BaseClass {
            protected $name = "BaseClass";
            function __construct() {
                print("In " . $this -> name ." constructor<br>");
            }
            function __destruct() {
                print("Destroying " . $this->name . " <br>");
            }
        }
        class SubClass{
            function __construct() {
                $this->name = "SubClass";
                parent::__construct();
            }
            function __destruct() {
                parent::__destruct();
            }
        }
        ?>
    </body>
</html>


