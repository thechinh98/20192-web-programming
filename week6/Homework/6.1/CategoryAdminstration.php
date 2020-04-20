<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Category Administration</title>
    </head>
    <body>
        <form action ="" method ="">
        <?php
        $server = '127.0.0.1:3306';
        $user = 'chinh1998';
        $passwd = 'HelloWorld123';
        $myDb = 'element';
        $table_name = 'category_administration';
        $connect = mysqli_connect($server, $user, $passwd);
        print "<font size = 5 color = blue>";
        print "$table_name Data </font><br>";
        $query = "SELECT * FROM $myDb.$table_name";
        print "The query is <i>$query</i>";
        mysqli_select_db($connect, $table_name);
        $result = mysqli_query($connect, $query);
        print "<table border = 0>";
        print '<tr><th bgcolor="#eeeeee">Cat ID</th>
                    <th bgcolor="#eeeeee">Title</th>
                    <th bgcolor="#eeeeee">Description</th>
                </tr>';
        while ($row = mysqli_fetch_row($result)) {
            print'<tr>';
            foreach ($row as $field) {
                print "<td>$field</td>";
            }
            print '/tr>';
        }
        print '<tr>'
                . '<td><input type = "text" size = 5 maxlength = 10 name = "Cat_ID"></td>'
                . '<td><input type = "text" size = 5 maxlength = 50 name = "Tide"></td>'
                . '<td><input type = "text" size = 5 maxlength = 50 name = "Description"></td>'
                . '</tr>';
        ?>
    </table> 
    <input type="hidden" name="add_record" value="1" />
    <input type="submit" name="submit" value="Add Category" />
    </form>>
</body>
</html>
