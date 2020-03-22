<html>
    <head>
        <title>String Example</title>
    </head>
    <body>
        <?php
        $name = "Christopher";
        $preference = "Milk Shake";

        $x = "banana";
        $sum = 1 + $x;
        print ("<br>y=$sum<br>");

        $firstname = "John";
        $lastname = "Smith";
        $fullname = $firstname . $lastname;
        print ("<br>Fullname=$fullname<br>");

        $fullname2 = "$firstname $lastname";
        print ("<br>Fullname=$fullname2<br>");

        $comments = "Good Job";
        $len = strlen($comments);
        print ("<br>Length=$len<br>");

        $in_name = " Joe Jackson ";
        $name = trim($in_name);
        print ("<br>name=$name$name<br>");

        $inquote = "Now Is The Time";
        $lower = strtolower($inquote);
        $upper = strtoupper($inquote);
        print ("<br>upper=$upper lower=$lower<br>");

        $date = "12/25/2002";
        $month = substr($date, 0, 2);
        $day = substr($date, 3, 2);
        print ("<br>Month=$month Day=$day<br>");

        $date = "12/25/2002";
        $year = substr($date, 6);
        print ("<br>Year=$year<br>");
        ?>
    </body>
</html>