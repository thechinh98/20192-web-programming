<?php
$username = "chinh1998";
$password = "HelloWorld123";
$hostspec = "127.0.0.1:3306";
$database = "business_service";
$connect = mysqli_connect($hostspec, $username, $password, $database);
$connect->select_db($database);

if ($connect->connect_errno) {
    die("Cannot connect to $host using $user");
    exit();
}
$registered = false;
if (isset($_POST['bizName'])) {
    $bizName = $_POST['bizName'];
    $address = $_POST['address'];
    $city = $_POST['city'];
    $telephone = $_POST['telephone'];
    $categories = $_POST['categories'];
    $url = $_POST['url'];
    if (strlen($bizName) > 0 && strlen($address) > 0 && strlen($city) > 0 && count($categories) > 0) {
        $registered = true;
    }
}
?>

<html>
    <head>
        <title>Business Registration</title>
    </head>
    <body>
        <h1>Business Registration</h1>
        <hr>
        <form action="add_biz.php" method="POST">
            <table>
                <tr>
                    <td>
                        <p>
                            <?php
                            $table_name = 'categories';
                            $query = "SELECT * FROM $table_name";
                            $results = $connect->query($query);
                            $catList = array();
                            while ($row = mysqli_fetch_array($results)) {
                                $catList[] = $row;
                            }
                            if (!$registered) {
                                echo "Click on one, or control-click on multiple categories:";
                            } else {
                                $regisSuccess = true;
                                $table_name = 'businesses';
                                $connect->select_db($database);
                                $addQuery = "INSERT INTO $table_name(Name, Address, City, Telephone, URL) VALUES('$bizName', '$address', '$city', '$telephone', '$url')";
                                $result = $connect->query($addQuery);
                                if ($result) {
                                    $bizID = $connect->insert_id;
                                    $table_name = 'biz_categories';
                                    foreach ($catList as $row) {
                                        if (in_array($row[1], $categories)) {
                                            $cateUpdateQuery = "INSERT INTO $table_name(Business_ID, Category_ID) VALUES($bizID, '$row[0]')";
                                            if (!$connect->query($cateUpdateQuery)) {
                                                $connect->rollback();
                                                echo "Insert failed! Query = $cateUpdateQuery";
                                                $regisSuccess = false;
                                                break;
                                            }
                                        }
                                    }
                                } else {
                                    $regisSuccess = false;
                                }
                                if ($regisSuccess) {
                                    echo "Record inserted as shown below";
                                } else {
                                    echo "Insert failed.";
                                }
                            }
                            ?>
                        </p>
                        <p>Select category values are highlighted:</p>
                        <?php
                        if ($catList) {
                            print '<select name = "categories[]" size = 5 multiple>';
                            foreach ($catList as $row) {
                                if ($registered) {
                                    if (in_array($row[1], $categories)) {
                                        print "<option selected>$row[1]</option>";
                                    } else {
                                        print "<option>$row[1]</option>";
                                    }
                                } else {
                                    print "<option>$row[1]</option>";
                                }
                            }
                            print "</select>";
                        } else {
                            die("Query failed, query = $query");
                        }
                        ?>
                    </td>
                    <td>
                        <table>
                            <tr>
                                <td>Business name: </td>
                                <td><input type="text" name="bizName" size="40" value="<?php echo ($bizName) ?>"></td>
                            </tr>
                            <tr>
                                <td>Address: </td>
                                <td><input type="text" name="address" size="40" value="<?php echo ($address) ?>"></td>
                            </tr>
                            <tr>
                                <td>City: </td>
                                <td><input type="text" name="city" size="40" value="<?php echo ($city) ?>"></td>
                            </tr>
                            <tr>
                                <td>Telephone: </td>
                                <td><input type="text" name="telephone" size="40" value="<?php echo ($telephone) ?>"></td>
                            </tr>
                            <tr>
                                <td>URL: </td>
                                <td><input type="text" name="url" size="40" value="<?php echo ($url) ?>"></td>
                            </tr>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td>
                        <?php
                        if (!$registered) {
                            echo '<input type="submit" value="Add Business">';
                        } else {
                            echo '<a href="add_biz.php">Add Another Business</a>';
                        }
                        $connect->close();
                        ?>
                    </td>
                </tr>
            </table>
        </form>
    </body>
</html>


