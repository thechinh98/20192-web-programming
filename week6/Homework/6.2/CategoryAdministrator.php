<html>
    <head>
        <title>
            <?php
            // print the window title and the topmost body heading
            $doc_title = 'Category Administration';
            echo "$doc_title\n";
            ?>
        </title>
    </head>
    <body>
        <h1>Category Administration</h1>
        <hr>
        <form action="admin.php" method="POST">
            <?php
            $username = "chinh1998";
            $password = "HelloWorld123";
            $hostspec = "127.0.0.1:3306";
            $database = "business_service";
            $table_name = 'categories';
            $connect = mysqli_connect($hostspec, $username, $password, $database);

            if ($connect->connect_errno) {
                die("Cannot connect to $host using $user");
                exit();
            } else {
                if (isset($_POST['catID'])) {
                    $catID = $_POST['catID'];
                    if (strlen($catID) > 0) {
                        $description = $_POST['description'];
                        $title = $_POST['title'];
                        $updateQuery = "INSERT INTO $table_name VALUES ('$catID','$title','$description')";
                        if (!$connect->query($updateQuery)) {
                            echo "Add new category failed.";
                        }
                    }
                }
            }

            $query = "SELECT * FROM $table_name";
            $connect->select_db($database);
            $results = $connect->query($query);
            if ($results) {
                print '<table>';
                print '<th>Cat ID<th>Title<th>Description';
                while ($row = mysqli_fetch_row($results)) {
                    print "<tr>";
                    foreach ($row as $field) {
                        print "<td>$field</td>";
                    }
                    print "</tr>";
                }
            } else {
                die("Query failed, query = $query");
            }
            ?>
            <tr>
                <td><input type="text" name="catID" size="10"></td>
                <td><input type="text" name="title" size="40"></td>
                <td><input type="text" name="description" size="50"></td>
            </tr>
            <tr>
                <td><input type="submit" value="Add category"></td>
            </tr>
            <?php
            $connect->close();
            ?>
        </form>
    </body>
</html>


