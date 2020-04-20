<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>PHP Input DB Form</title>
    </head>
    <body>
        <?php
        $host = "127.0.0.1:3306";
        $user = "chinh1998";
        $pass = 'HelloWorld123';
        $mydb = 'Products';
        $table_name = 'element';
        $Item = filter_input(INPUT_POST, "Item");
        $Cost = filter_input(INPUT_POST, "Cost");
        $Weight = filter_input(INPUT_POST, "Weight");
        $Quantity = filter_input(INPUT_POST, "Quantity");
        $connect = mysqli_connect($host, $user, $pass);
        $query = "INSERT INTO $table_name VALUES "
                . "('0','$Item','$Cost','$Weight','$Quantity')";
        print("The Query is: <i>$query</i>");
        mysqli_select_db($connect,$table_name);
        print('<br> <font size = "4" color = "blue');
        if(mysqli_query($connect,$query)){
            print "Insert into $mydb was successful!</font>";
        } else {
            print "Insert into $mydb was failed</font>";
        } mysql_close($connect);
        ?>
    </body>
</html>
