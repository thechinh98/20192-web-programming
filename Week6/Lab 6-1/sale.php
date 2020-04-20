<html>
    <head><title>Update products</title></head>
    <body>
        <?php
        $host = 'localhost';
        $user = 'root';
        $passwd = '';
        $database = 'test';
        $table_name = 'Products';
        $connect = mysqli_connect($host, $user, $passwd, $database);

        if ($connect->connect_errno) {
            die("Cannot connect to $host using $user");
            exit();
        } else {
            $connect->select_db($database);
            if (isset($_POST["Search"])) {
                $Search = $_POST["Search"];
                if (strlen($Search) > 0) {
                    $updateQuery = "UPDATE $table_name SET Numb = Numb - 1 WHERE(Product_desc = '$Search')";
                    print "The Query is <i>$updateQuery</i><br>";
                    if (mysqli_query($connect, $updateQuery)) {
                        print "Update into $database was successful!</font>";
                    } else {
                        print "Update into $database failed!</font>";
                    }
                }
            }
            print "<br><br>";
            $query = "SELECT * FROM $table_name";
            $results_id = mysqli_query($connect, $query);
            if ($results_id) {
                print '<br><table border = 1>';
                print '<th>Num<th>Product<th>Cost<th>Weight<th>Count';
                while ($row = mysqli_fetch_row($results_id)) {
                    print '<tr>';
                    foreach ($row as $field) {
                        print "<td>$field</td>";
                    }
                    print '</tr>';
                }
            } else {
                die("query=$Query Failed");
            }
            mysqli_close($connect);
        }
        ?>
    </body>
</html>