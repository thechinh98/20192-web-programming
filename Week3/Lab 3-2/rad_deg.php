<html>
    <head><title>Radians - Degrees Converter</title></head>
    <body>
        <form method="POST">
            <input type="text" name="number" value="0" />
            <select name="function">
                <option value="rad_to_deg">Radian to Degree</option>
                <option value="deg_to_rad">Degree to Radian</option>
            </select>
            <input type="submit" value="Submit" />
        </form>
        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            echo "The result is " . call_user_func($_POST["function"], $_POST["number"]);
        }
        ?>
    </body>
</html>

<?php

function deg_to_rad($deg) {
    return $deg * M_PI / 180;
}

function rad_to_deg($rad) {
    return $rad * 180 / M_PI;
}
?>