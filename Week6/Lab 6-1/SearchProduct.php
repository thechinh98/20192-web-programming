<html><head><title>Insert Results</title></head><body>
        
    <?php
        $host = 'localhost';
        $user = 'root';
        $passwd = '';
        $database = 'test';
        $connect = mysqli_connect($host, $user, $passwd,$database);
        $table_name = 'Products';  
        print '<br><font size="5" color="blue">';
        print "$table_name Data</font><br>";
        $Search = $_POST["Search"];
        $query = "SELECT * FROM $table_name WHERE (Product_desc = '$Search')";
        print "The Query is <i>$query</i><br>";
        mysqli_select_db($connect,$database);
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
        } else { die ("query=$Query Failed");}
        mysqli_close($connect);
    ?></body></html>