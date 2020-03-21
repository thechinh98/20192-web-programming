<html>
    <head><title>Convert Degree to Radian</title></head>
    <?php

    function convert($static, $type) {
        if ($static >= 0) {
            if ($type == 1) {
                $result = $static * M_PI / 180;
                print("<br> The result is: $result rad");
            } else {
                $result = $static * 180 / M_PI;
                print("<br>The result is: $result degree");
            }
        } else {
            print('<br><font size ="2" color = "red"> IIllegal input</font>');
        }
    }
    ?>
    <body>
        <font color = "blue" size = 5> Convert </font>
        <br>
        <form action = "<?php echo filter_input(INPUT_SERVER, "PHP_SELF") ?>" method ="POST">
            <?php
            if (array_key_exists("static", $_POST)) {
                $static = filter_input(INPUT_POST, "static");
                $type = filter_input(INPUT_POST, 'type');
            } else {
                $static = 0;
                $type = 1;
            }
            ?>
            <table>
                <tr>
                    <td>Input static: </td>
                    <td><input type ="text" size ="5" maxlength ="7" name ="static"></td>
                </tr>
                <tr>
                    <td> <input type ="radio" name ="type" value ="1">Degree to Radian</td>
                    <td><input type ="radio" name ="type" value ="2"> Radian to Degree</td>
                </tr>
                <tr>
                    <td align ="right"><input type ="submit" value ="Submit"></td>
                    <td align ="left"><input type="reset" value ="Reset"></td>
                </tr>
            </table>
            <table>
                <?php
                if (array_key_exists("static", $_POST)) {
                    convert($static, $type);
                }
                ?>
            </table>
        </form>
    </body>
</html>

