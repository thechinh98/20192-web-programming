<?php
$username = "root";
$password = "";
$hostspec = "localhost";
$database = "business_service";
$connect = mysqli_connect($hostspec, $username, $password, $database);
$connect->select_db($database);

if ($connect->connect_errno) {
    die("Cannot connect to $server using $user");
    exit();
}
$table_name = 'categories';
$query = "SELECT * FROM $table_name";
$results = $connect->query($query);
$catList = array();
while ($row = mysqli_fetch_array($results)) {
    $catList[] = $row;
}
?>

<html>
    <head>
        <title>Business Listing</title>
    </head>
    <body>
        <h1>Business Listing</h1>
        <hr>
        <table>
            <tr>
                <td valign="top">
                    <?php
                    print '<table border=1>';
                    print '<th>Click on a category to find business listings:';
                    foreach ($catList as $row) {
                        print "<tr><td><a href='biz_listing.php?catID=$row[0]'>$row[1]</a></td></tr>";
                    }
                    print "</table>";
                    ?>
                </td>
                <td valign="top">
                    <?php
                    if (isset($_GET['catID'])) {
                        $catID = $_GET['catID'];
                        if (strlen($catID) > 0) {
                            $table_name = "biz_categories";
                            $findQuery = "SELECT * FROM $table_name WHERE(Category_ID = '$catID')";
                            $results = $connect->query($findQuery);
                            if ($results) {
                                $table_name = "businesses";
                                print '<table border=1>';
                                print '<th>ID<th>Name<th>Address<th>City<th>Telephone<th>URL';
                                while ($row = mysqli_fetch_row($results)) {
                                    $bizQuery = "SELECT * FROM $table_name WHERE(Business_ID = $row[0])";
                                    $biz = $connect->query($bizQuery);
                                    if ($biz) {
                                        while ($row = mysqli_fetch_row($biz)) {
                                            print "<tr>";
                                            foreach ($row as $field) {
                                                print "<td>$field</td>";
                                            }
                                            print "<tr/>";
                                        }
                                    }
                                }
                                print "</table>";
                            }
                        }
                    }
                    $connect->close();
                    ?>
                </td>
            </tr>
        </table>
    </body>
</html>