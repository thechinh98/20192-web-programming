<html>
    <head>
        <?php
        require_once('db_login.php');
        ?>

        <title>
            <?php
            // print the window title and the topmost body heading
            $doc_title = 'Category Administration';
            echo "$doc_title\n";
            ?>
        </title>
    </head>
    <body>
        <h1>
            <?php
            echo "$doc_title\n";
            ?>
        </h1>

        <?php
        // add category record input section
        // extract values from $_REQUEST
        
        $sql = "select * from categories";
        $result = $db->query($sql);
        ?>

        <form method="post" action="<?= $PHP_SELF ?>">

            <table>
                <tr><th bgcolor="#eeeeee">Cat ID</th>
                    <th bgcolor="#eeeeee">Title</th>
                    <th bgcolor="#eeeeee">Description</th>
                </tr>

<?php
// display any records fetched from the database
// plus an input line for a new category
while ($row = $result->fetchRow()) {
    echo "<tr><td>$row[0]</td><td>$row[1]</td><td>$row[2]</td></tr>\n";
}
?>

                <tr><td><input type="text" name="Cat_ID"    size="15" maxlength="10" /></td>
                    <td><input type="text" name="Cat_Title" size="40" maxlength="128" /></td>
                    <td><input type="text" name="Cat_Desc"  size="45" maxlength="255" /></td>
                </tr>
            </table>
            <input type="hidden" name="add_record" value="1" />
            <input type="submit" name="submit" value="Add Category" />
    </body>
</html>