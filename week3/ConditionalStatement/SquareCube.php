<html>
    <head><title> Square and Cube</title></head>
    <body>
        <font size ="8" color =""blue">Generate Square and Cube value</font>
        <br>
        <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method ="GET">
            <?php
            if (array_key_exists("start", $_GET)) {
                $start = filter_input(INPUT_GET, "start");
                $end = filter_input(INPUT_GET, "end");
            } else {
                $start = 0;
                $end = 0;
            }
            ?>
            <table>
                <tr>
                    <td>Select start number: </td>
                    <td><select name ="start">
                            <?php
                            for ($i = 0; $i <= 10; $i++) {
                                print("<option>$i</option>");
                            }
                            ?>
                        </select></td>
                </tr><tr>
                    <td>Select end number: </td>
                    <td><select name ="end">
                            <?php
                            for ($i = 0; $i <= 20; $i++) {
                                print("<option>$i</option>");
                            }
                            ?>
                        </select></td>
                </tr>
                <tr>
                    <td align ="right"><input type ="submit" value ="Submit"></td>
                    <td align ="left"><input type="reset" value ="Reset"></td>
                </tr>
            </table>
            <table>
                <?php
                if (array_key_exists("start", $_GET)) {
                    $i = $start;
                    print("<tr><th>Number</th><th>Square</th><th>Cube</th></tr>");
                    while ($i <= $end) {
                        $sqr = $i * $i;
                        $cubed = $i * $i * $i;
                        print "<tr><td>$i</td><td>$sqr</td><td>$cubed</td></tr>";
                        $i = $i + 1;
                    }
                }
                ?>
            </table>
        </form>
    </body>
</html>
