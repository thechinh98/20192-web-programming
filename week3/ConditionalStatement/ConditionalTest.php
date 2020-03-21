<html>
    <head>
        <title>Result Form</title>
    </head>
    <body>
        <?php
        $first = filter_input(INPUT_GET,"firstName");
        $last = filter_input(INPUT_GET,"lastName");
        $middle = filter_input(INPUT_GET,"middleName");
        print("Hi $last! Your full name is $last $first $middle. <br> <br>");
        if ($first == $last) {
            print("$first and $last are equal!");
        } else if ($first > $last) {
            print("$first is more than $last");
        } else if ($first < $last) {
            print("$first is less than $last");
        }
        print("<br> <br>");
        $grade1 = filter_input(INPUT_GET,"grade1");
        $grade2 = filter_input(INPUT_GET,"grade2");
        $final = (2 * $grade1 + 3 * $grade2) / 5;
        if ($final > 89) {
            print("Your score is $final.You got an A. Congrats!");
        } else if ($final > 79) {
            print("Your score is $final.You got an B");
        } else if ($final > 69) {
            print("Your score is $final.You got an C");
        } else if ($final > 59) {
            print("Your score is $final.You got an D");
        } elseif ($final > 0) {
            print("Your score is $final. You got an F");
        } else {
            print("Illegal grade less than 0. Final grade = $final");
        }
        ?>
    </body>
</html>