<html>
<head><title>Date Time Processor</title></head>
<body>
  <h4>Enter your name and select date and time for the appointment</h4>
  <form action="date_time_processing.php" method="POST">
    <table>
      <tbody>
        <tr>
          <td>Yourname:</td>
              <td><input type="text" name="name" value="<?= get_value("name"); ?>"></td>
        </tr>
        <tr>
          <td>Date:</td>
          <td>
            <?php select("day", 1, 31, get_value("day"));?>
            <?php select("month", 1, 12, get_value("month"));?>
            <?php select("year", 1970, 2500, get_value("year"));?>
          </td>
        </tr>
        <tr>
          <td>Time: </td>
          <td>
            <?php select("hour", 0, 23, get_value("hour"));?>
            <?php select("minute", 0, 59, get_value("minute"));?>
            <?php select("second", 0, 59, get_value("second"));?>
          </td>
        </tr>
        <tr>
          <td></td>
          <td>
            <input type="submit" value="Submit">
            <input type="reset" value="Reset">
          </td>
        </tr>
      </tbody>
    </table>
    <?php 
      if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $name = get_value("name");
        $month = get_value("month");
        $day = get_value("day");
        $year = get_value("year");
        $hour = get_value("hour");
        $minute = get_value("minute");
        $second = get_value("second");
        $iso_time = sprintf("%04d-%02d-%02d %02d:%02d:%02d", $year, $month, $day, $hour, $minute, $second);
        $timestamp = strtotime($iso_time);
        
        if (checkdate($month, $day, $year)) {
          print "Hi $name! You choose the date " . date('D, d M Y H:i:s', $timestamp) . "<br />";
          print "There is " . cal_days_in_month(CAL_GREGORIAN, $month, $year) . " days in " . date('F Y', $timestamp) . "<br />";
          print "12 hours from this is " . date('D, d M Y H:i:s', $timestamp + 12 * 60 * 60);
        } else {
          print "Your date is invalid!";
        }    
      } 
    ?>
  </form>
</body>
</html>
<?php 
function select($name, $start, $end, $current) {
  print "<select name=\"$name\">";
  for ($i = $start; $i <= $end; $i++) {
    if ($i == $current)
      print "<option value=\"$i\" selected>$i</option>";
    else
      print "<option value=\"$i\">$i</option>";
  }
  print "</select>";
}

function get_value($name, $default = null) {
  return (array_key_exists($name, $_POST) ? $_POST[$name] : $default);
}
?>