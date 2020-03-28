<html>
    <head><title>Distance and Time Calculations</title></head>
    <body>
        <?php
        $cities = array(
            'Dallas' => 803,
            'Toronto' => 435,
            'Boston' => 848,
            'Nashville' => 406,
            'Las Vegas' => 1526,
            'San Francisco' => 1189,
            'Washington, DC' => 595,
            'Miami' => 1189,
            'Pittsburgh' => 409
        );
        $destinations = $_GET['destination'];
        ?>
        
        From Chicago to:
        <table>
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Destination</th>
                    <th>Distance</th>
                    <th>Driving time</th>
                    <th>Walking time</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    foreach ($destinations as $index => $destination) {
                        print "<tr><td>$index</td>";
                        print "<td>$destination</td>";
                        if (isset($cities[$destination])) {
                            $distance = $cities[$destination];
                            $time = round(($distance / 60.0) , 2);
                            $walktime = round(($distance / 5.0) , 2);
                            print "<td>$distance</td>";
                            print "<td>$time</td>";
                            print "<td>$walktime</td>";
                        } else {
                            print "<td colspan='3'>Sorry we don't have destination information.</td>";
                        }
                        print "</tr>";
                    }
                ?>
            </tbody>
        </table>
    </body>
</html>
