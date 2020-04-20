<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        $host = "127.0.0.1:3306";
        $user = "chinh1998";
        $pass = 'HelloWorld123';
        $mydb = 'Products';
        $table_name = 'element';
        $connect = mysqli_connect($host, $user, $pass);
        print "<font size = 5 color = blue>";
        print "$table_name Data </font><br>";
        $query = "SELECT * FROM $table_name";
        print "The query is <i> $query</i><br>";
        mysqli_select_db($connect, $table_name);
        $result_id = mysqli_query( $connect,$query);
        if($result_id){
            print '<table border = 1>';
            print '<th>Num<th>Product<th>Cost<th>Weight<th>Count';
            while($row = mysqli_fetch_row($result_id)){
                print '<tr>';
                foreach ($row as $field){
                    print "<td> $field</td>";
                    
                }
                print '</tr>';
            }
        }else {
            die("Query =$query failed");
        }
        
        mysqli_close($connect);
        ?>
        </table>
    </body>
</html>
