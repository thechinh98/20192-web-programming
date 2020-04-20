<html>
    <head><title>Update product</title></head>
    <body>
        <h1>Select Product We Just Sold</h1>
        <form action="sale.php" method="POST">
            <label>Hammer</label>
            <input type="radio" name="Search" value="Hammer">

            <label>Wrench</label>
            <input type="radio" name="Search" value="Wrench">

            <label>Screwdriver</label>
            <input type="radio" name="Search" value="Screwdriver"><br>

            <input type="submit" value="Click to submit">
            <input type="reset" value="Reset">
        </form>
        <br>
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
            $query = "SELECT * FROM $table_name";
            $connect->select_db($database);
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