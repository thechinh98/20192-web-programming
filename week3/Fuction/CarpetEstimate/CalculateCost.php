<html>
    <head><title> Your Estimate Carpet Cost</title></head>
    <?php
    function carpet_cost($width, $length, $grade, $carpet_cost) {
        if ($width > 0 && $length > 0) {
            if ($grade == 1) {
                $carpet_cost = $width * $length * 4.99;
                return 1;
            } else if ($grade == 2) {
                $carpet_cost = $width * $length * 3.99;
                return 1;
            } else {
                print "Unknown carpet grade = $grade";
                return 0;
            }
        }
        return 0;
    }

    $width = filter_input(INPUT_POST, 'width');
    $length = filter_input(INPUT_POST, 'length');
    $grade = filter_input(INPUT_POST, "grade");
    $carpet_cost = 0;
    $initial_cost = 0;
    $ret = carpet_cost($width, $length, $grade, $carpet_cost);
    if ($ret) {
        $room_size = $width * $length;
        $total_cost = $carpet_cost * 1.5;
        print "<br> Total square feet = $room_size";
        print "<br> Carpet grade = $grade";
        print "<br> Carpet cost = \$$carpet_cost";
        print "<br> Total cost estimate (installed) is = \$$total_cost";
    } else {
        print "Illegal value received";
    }
    ?>
</html>
