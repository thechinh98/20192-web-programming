<html>
    <head><title>Create Table</title></head>
    <body>
        <?php
        $server = '127.0.0.1:3306';
        $user = 'chinh1998';
        $pass = 'HelloWorld123';
        $mydb = 'Products';
        $table_name = 'element';
        $connect = mysqli_connect($server, $user, $pass);
        if (!$connect) {
            die ("Cannot connect to $server using $user");
        } else {
            $SQLcmd = "CREATE TABLE $table_name("
                    . "ProductID INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,"
                    . "Product_desc VARCHAR(50),"
                    . "Cost INT,"
                    . "Weight INT,"
                    . "Numb INT)";
            mysqli_select_db($connect,$mydb);
            if (mysqli_query($connect,$SQLcmd)) {
                print '<font size ="4" color = "blue"> Create Table';
                print "<i>$table_name</i> in database <i> $mydb</i><br></font>";
                print "<br>SQLcmn = $SQLcmd";
            } else {
                die ("Table Create Creation Failed SQLcmd=$SQLcmd");
            }
        }
        ?>
    </body>
</html>


