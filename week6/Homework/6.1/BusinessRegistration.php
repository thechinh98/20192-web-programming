<html>

    <head>
        <title>
            <?php
            $doc_title = 'Business Registration';
            echo "$doc_title\n";
            ?>
        </title>
    </head>

    <body>
        <h1>
            <?= $doc_title ?>
        </h1>

        <?php
        require_once('db_login.php');

        // fetch query parameters
        

        $pick_message = 'Click on one, or control-click on<BR>multiple ';
        $pick_message .= 'categories:';

        
        ?>

        <form method="post" action="<?= $PHP_SELF ?>">
            <table>
                <tr>
                    <td class="picklist"><?= $pick_message ?>
                        <p>
                            <select name="Categories[]" size="4" multiple>
                                <?php
                                // build the scrolling pick list for the categories
                                $sql = "SELECT * FROM Categories";
                                $result = $db->query($sql);
                                if (DB::isError($result))
                                    die($result->getMessage());
                                while ($row = $result->fetchRow()) {
                                    if (DB::isError($row))
                                        die($row->getMessage());
                                    if ($add_record == 1) {
                                        $selected = false;
                                        // if this category was selected, add a new biz_categories row
                                        if (in_array($row[1], $Biz_Categories)) {
                                            $sql = 'INSERT INTO Biz_Categories';
                                            $sql .= ' (Business_ID, Category_ID)';
                                            $sql .= ' VALUES (?, ?)';
                                            $params = array($biz_id, $row[0]);
                                            $query = $db->prepare($sql);
                                            if (DB::isError($query))
                                                die($query->getMessage());
                                            $resp = $db->execute($query, $params);
                                            if (DB::isError($resp))
                                                die($resp->getMessage());
                                            $resp = $db->commit();
                                            if (DB::isError($resp))
                                                die($resp->getMessage());
                                            echo "<option selected=\"selected\">$row[1]</option>\n";
                                            $selected = true;
                                        }
                                        if ($selected == false) {
                                            echo "<option>$row[1]</option>\n";
                                        }
                                    } else {
                                        echo "<option>$row[1]</option>\n";
                                    }
                                }
                                ?>

                            </select>
                    </td>
                    <td class="picklist">
                        <table>
                            <tr>
                                <td class="FormLabel">Business Name:</td>
                                <td><input type="text" name="Name" size="40" maxlength="255" value="" /></td>
                            </tr>
                            <tr>
                                <td class="FormLabel">Address:</td>
                                <td><input type="text" name="Address" size="40" maxlength="255" value="" /></td>
                            </tr>
                            <tr>
                                <td class="FormLabel">City:</td>
                                <td><input type="text" name="City" size="40" maxlength="128" value="" /></td>
                            </tr>
                            <tr>
                                <td class="FormLabel">Telephone:</td>
                                <td><input type="text" name="Telephone" size="40" maxlength="64" value="" /></td>
                            </tr>
                            <tr>
                                <td class="FormLabel">URL:</TD>
                                <td><input type="text" name="URL" size="40" maxlength="255" value="" /></td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </table>
            <p>
                <input type="hidden" name="add_record" value="1" />
                <input type="submit" name="submit" value="Add Business" />
            </p>
    </body>

</html>