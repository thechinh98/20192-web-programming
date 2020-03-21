<?php declare(strict_types=1) ?>
<html>
    <head><title>Appointment</title></head>
    <body>
        <font color="blue" size ="5">Enter their name and their Dob for comparing</font>
        <br>
        <form action="<?php echo filter_input(INPUT_SERVER, 'PHP_SELF') ?>" method ="get">
            <?php
            if (array_key_exists("date1", $_GET)) {
                $date1 = filter_input(INPUT_GET, "date1");
                $month1 = filter_input(INPUT_GET, "month1");
                $year1 = filter_input(INPUT_GET, "year1");
                $name1 = filter_input(INPUT_GET, "name1");
                $date2 = filter_input(INPUT_GET, "date2");
                $month2 = filter_input(INPUT_GET, "month2");
                $year2 = filter_input(INPUT_GET, "year2");
                $name2 = filter_input(INPUT_GET, "name2");
                switch ($month1) {
                    case 1:
                        $monthName1 = "January";
                        break;
                    case 2:
                        $monthName1 = "Febuary";
                        break;
                    case 3:
                        $monthName1 = "March";
                        break;
                    case 4:
                        $monthName1 = "April";
                        break;
                    case 5:
                        $monthName1 = "May";
                        break;
                    case 6:
                        $monthName1 = "June";
                        break;
                    case 7:
                        $monthName1 = "July";
                        break;
                    case 8:
                        $monthName1 = "August";
                        break;
                    case 9:
                        $monthName1 = "September";
                        break;
                    case 10:
                        $monthName1 = "Octorber";
                        break;
                    case 11:
                        $monthName1 = "November";
                        break;
                    case 12:
                        $monthName1 = "December";
                        break;
                }
                switch ($month2) {
                    case 1:
                        $monthName2 = "January";
                        break;
                    case 2:
                        $monthName2 = "Febuary";
                        break;
                    case 3:
                        $monthName2 = "March";
                        break;
                    case 4:
                        $monthName2 = "April";
                        break;
                    case 5:
                        $monthName2 = "May";
                        break;
                    case 6:
                        $monthName2 = "June";
                        break;
                    case 7:
                        $monthName2 = "July";
                        break;
                    case 8:
                        $monthName2 = "August";
                        break;
                    case 9:
                        $monthName2 = "September";
                        break;
                    case 10:
                        $monthName2 = "Octorber";
                        break;
                    case 11:
                        $monthName2 = "November";
                        break;
                    case 12:
                        $monthName2 = "December";
                        break;
                }
            }

            function checkPerson($date1, $month1, $year1, $monthName1) {
                if ($month1 == 4 || $month1 == 6 || $month1 == 9 || $month1 == 11) {
                    if ($date1 == 31) {
                        print("$monthName1 only has 30 days");
                        return 0;
                    }
                } else if ($month1 == 2) {
                    if ($date1 == 30 || $date1 == 31) {
                        print("$monthName1 do not have more than 29 day");
                        return 0;
                    } else if ($date1 == 29) {
                        if ($year1 % 100 != 0 || $year1 % 400 != 0) {
                            print("$year1 $monthName1 only have 28 days");
                            return 0;
                        }
                    }
                }
                return 1;
            }

            function compareDob($date1, $month1, $year1, $name1, $date2, $month2, $year2, $name2) {
                $differentYear = $year1 - $year2;
                $differentMonth = $month1 - $month2;
                $differentDate = $date1 - $date2;
                print "<br>";
                if ($differentYear > 0) {
                    print("$name1 is " . abs($differentYear) . " years younger than $name2");
                } else if ($differentYear < 0) {
                    print("$name1 is " . abs($differentYear) . " years older than $name2");
                } else {
                    if ($differentMonth > 0) {
                        print("$name1 is " . abs($differentMonth) . " months younger than $name2");
                    } elseif ($differentMonth < 0) {
                        print("$name1 is " . abs($differentMonth) . " months older than $name2");
                    } else {
                        if ($differentDate > 0) {print("$name1 i s" . abs($differentDate) . " dates younger than $name2");
                        } elseif ($differentDate < 0) { print("$name1 is " . abs($differentDate) . " dates older than $name2");
                        } else {print"$name1 and $name2 are same age!";
                        }
                    }
                }
            }

            function printAge($name1, $year1, $name2, $year2) {
                print "<br>";
                print ("<br> $name1 is " . (2020 - $year1) . " years old");
                print ("<br> $name2 is " . (2020 - $year2) . " years old");
            }
            ?>
            <table>
                <tr>
                    <td>Person1's name: </td>
                    <td><input type="text" size="15" maxlength="17" name = "name1"></td>
                </tr>
                <tr>
                    <td>DoB: </td>
                    <td>
                        <select name = "date1">
                            <?php
                            for ($i = 1; $i <= 31; $i++) {
                                print("<option>$i</option>");
                            }
                            ?>
                        </select>
                        <select name = "month1">
                            <?php
                            for ($i = 1; $i <= 12; $i++) {
                                print("<option>$i</option>");
                            }
                            ?>
                        </select>
                        <select name = "year1">
                            <?php
                            for ($i = 1900; $i < 2020; $i++) {
                                print("<option>$i</option>");
                            }
                            ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Person2's name: </td>
                    <td><input type="text" size="15" maxlength="17" name = "name2"></td>
                </tr>
                <tr>
                    <td>DoB: </td>
                    <td>
                        <select name = "date2">
                            <?php
                            for ($i = 1; $i <= 31; $i++) {
                                print("<option>$i</option>");
                            }
                            ?>
                        </select>
                        <select name = "month2">
                            <?php
                            for ($i = 1; $i <= 12; $i++) {
                                print("<option>$i</option>");
                            }
                            ?>
                        </select>
                        <select name = "year2">
                            <?php
                            for ($i = 1900; $i < 2020; $i++) {
                                print("<option>$i</option>");
                            }
                            ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td align ='right'><input type ='submit' value ='Submit'></td>
                    <td align ='left'><input type ='reset' value ='Reset'></td>
                </tr>
            </table>
            <table>
                <?php
                /** @var type $_GET */
                if (array_key_exists("date1", $_GET) && array_key_exists("date2", $_GET)) {
                    if (checkPerson($date1, $month1, $year1, $monthName1) && checkPerson($date2, $month2, $year2,$monthName2)) {
                        compareDob($date1, $month1, $year1, $name1, $date2, $month2, $year2, $name2);
                        printAge($name1,$year1,$name2, $year2);
                    }
                }
                ?>
            </table>
        </form>
    </body>
</html>

