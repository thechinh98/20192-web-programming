<html>
    <head><title>Date Time Function</title></head>
    <body>
        <h4>Birthdays</h4>
        <?php
        $name1 = get_value("name1");
        $name2 = get_value("name2");
        $birthday1 = get_value("birthday1");
        $birthday2 = get_value("birthday2");
        ?>
        
        <form method="POST">
            <label>
                Name of first person:
                <input type="text" name ="name1" value="<?= $name1; ?>"/> <!--short tag for <?php echo $a; ?>-->
            </label>
            <label>
                Birthday of first person:
                <input type="date" name="birthday1" value="<?= $birthday1; ?>"/>
            </label>
            
            <hr/>
            
            <label>
                Name of second person:
                <input type="text" name ="name2" value="<?= $name2; ?>"/>
            </label>
            <label>
                Birthday of second person:
                <input type="date" name="birthday2" value="<?= $birthday2; ?>"/>
            </label>
            <br/>
            <input type="submit" value ="Submit">
        </form>
        
        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $time1 = strtotime($birthday1);
            $time2 = strtotime($birthday2);
            $age1 = age($time1);
            $age2 = age($time2);
            
            if ($time1 == FALSE) {
                echo '<p style="color:red">First person\'s birthday is invalid.</p>';
            } else {
                echo '<p style="color:blue">First person\'s birthday is  ' .date('D, d M Y',$time1). '. First person is ' . $age1 . ' years old.</p>';
            }
            
            if ($time2 == FALSE) {
                echo '<p style="color:red">Second person\'s birthday is invalid.</p>';
            } else {
                echo '<p style="color:blue">Second person\'s birthday is  ' .date('D, d M Y',$time2). '. Second person is ' . $age2 . ' years old.</p>';
            }
            
            if ($time1 !== FALSE && $time2 !== FALSE) {
                $day_different = abs ($time2 - $time1) / 60 / 60 / 24;
                echo "There are $day_different days " . " between first person's birthday and second person's birthday.<br>"; 
                echo "There are ".abs($age2 - $age1). " year(s) between first person's birthday and second person's birthday.";
            }
        }
        ?>
    </body>
</html>

<?php
function get_value($name, $default = null) {
  return (array_key_exists($name, $_POST) ? $_POST[$name] : $default);
}

function age($timestamp) {
  return (int) (abs(time() - $timestamp) / (60 * 60 * 24 * 365));
}
?>