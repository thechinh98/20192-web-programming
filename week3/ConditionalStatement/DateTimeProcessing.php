<?php declare(strict_types=1) ?>
<html>
    <head><title>Appointment</title></head>
    <body>
        <font color="blue" size ="5">Enter your name and select date and time for the appointment</font>
        <br>
        <form action="<?php echo filter_input(INPUT_SERVER, 'PHP_SELF') ?>" method ="get">
            <?php
            if (array_key_exists("month", $_GET)) {
                $date = filter_input(INPUT_GET, "date");
                $month = filter_input(INPUT_GET, "month");
                $year = filter_input(INPUT_GET, "year");
                $name = filter_input(INPUT_GET, "name");
                $hour = filter_input(INPUT_GET, "hour");
                $minute = filter_input(INPUT_GET, "minute");
                $second = filter_input(INPUT_GET, "second");
                switch ($month) {
                    case 1:
                        $monthName1 = "January";
                        $dayInMonth = 31;
                        break;
                    case 2:
                        $monthName1 = "Febuary";
                        $dayInMonth = 29;
                        break;
                    case 3:
                        $monthName1 = "March";
                        $dayInMonth = 31;
                        break;
                    case 4:
                        $monthName1 = "April";
                        $dayInMonth = 30;
                        break;
                    case 5:
                        $monthName1 = "May";
                        $dayInMonth = 31;
                        break;
                    case 6:
                        $monthName1 = "June";
                        $dayInMonth = 30;
                        break;
                    case 7:
                        $monthName1 = "July";
                        $dayInMonth = 31;
                        break;
                    case 8:
                        $monthName1 = "August";
                        $dayInMonth = 31;
                        break;
                    case 9:
                        $monthName1 = "September";
                        $dayInMonth = 30;
                        break;
                    case 10:
                        $monthName1 = "Octorber";
                        $dayInMonth = 31;
                        break;
                    case 11:
                        $monthName1 = "November";
                        $dayInMonth = 30;
                        break;
                    case 12:
                        $monthName1 = "December";
                        $dayInMonth = 31;
                        break;
                }
                if ($hour > 12) {
                    $hourIn24 = $hour - 12;
                    $timeZone = "PM";
                } else {
                    $hourIn24 = $hour;
                    $timeZone = "AM";
                }
            }
            ?>
            <table>
                <tr>
                    <td>Your name: </td>
                    <td><input type="text" size="15" maxlength="17" name = "name"></td>
                </tr>
                <tr>
                    <td>Date: </td>
                    <td>
                        <select name = "date">
                            <?php
                            for ($i = 1; $i <= 31; $i++) {
                                print("<option>$i</option>");
                            }
                            ?>
                        </select>
                        <select name = "month">
                            <?php
                            for ($i = 1; $i <= 12; $i++) {
                                print("<option>$i</option>");
                            }
                            ?>
                        </select>
                        <select name = "year">
                            <?php
                            for ($i = 1900; $i < 2020; $i++) {
                                print("<option>$i</option>");
                            }
                            ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Date: </td>
                    <td>
                        <select name = "hour">
                            <?php
                            for ($i = 0; $i < 24; $i++) {
                                print("<option>$i</option>");
                            }
                            ?>
                        </select>
                        <select name = "minute">
                            <?php
                            for ($i = 0; $i < 60; $i++) {
                                print("<option>$i</option>");
                            }
                            ?>
                        </select>
                        <select name = "second">
                            <?php
                            for ($i = 0; $i < 60; $i++) {
                                print("<option>$i</option>");
                            }
                            ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td align ="right"><input type ="submit" value ="Submit"></td>
                    <td align ="left"><input type="reset" value ="Reset"></td>

                </tr>
            </table>
            <table>
                <?php
                if (array_key_exists("date", $_GET)) {
                    if ($month == 4 || $month == 6 || $month == 9 || $month == 11) {
                        if ($date == 31) {
                            print("$monthName1 only has 30 days");
                        }
                    } else if ($month == 2) {
                        if ($date == 30 || $date == 31) {
                            print("$monthName1 do not have more than 29 day");
                        } else if ($date == 29) {
                            if ($year % 100 != 0 || $year % 400 != 0) {
                                print("$year $monthName1 only have 28 days");
                                $dayInMonth = 28;
                            } else {
                                print("Hi $name! <br> You have choose to have an appointment on $hour:$minute:$second, $date/$month/$year<br>"
                                        . "More information <br> In 12 hours, the time and date is $hourIn24:$minute:$second $timeZone, $date/$month/$year <br>"
                                        . " This month has $dayInMonth days!");
                            }
                        }
                    } else {
                        print("Hi $name! <br> You have choose to have an appointment on $hour:$minute:$second, $date/$month/$year<br>"
                                . "More information <br> In 12 hours, the time and date is $hourIn24:$minute:$second $timeZone, $date/$month/$year <br>"
                                . " This month has $dayInMonth days!");
                    }
                }
                ?>
            </table>
        </form>
    </body>
</html>

