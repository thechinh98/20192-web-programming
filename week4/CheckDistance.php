<html>
    <head><title>Distance and time calculator</title></head>
    <body>
        <?php
        $cities = array('Dallas' => 803, 'Toronto' => 453, 'Boston' => 853, 'NashVille' => 406,
        'Las Vegas' => 1526, 'San Francissco' => 1835, 'Washington Dc' => 595, 'Miami' => 1189,
        'Pittaburgh' => 409);
        $destination = filter_input(INPUT_POST, "destination");
        if (isset($cities[$destination])) {
            $distance = $cities[$destination];
            $time = round(($distance / 60), 2);
            $walk = round(($distance / 5), 2);
            print("The distance between Chicago and <i>$destination</i> is distance miles");
            print("<br>Driving at 60 miles per hour and it will take $time hours");
            print "<br>Walking at 5 miles per hour and it will take $walk hours" ;
        } else {
            print "Sorry, we don't have destination infomation";
        }
        ?>
    </body>

</html>


