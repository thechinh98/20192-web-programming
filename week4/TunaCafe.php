<html>
    <head><title> Tuna Cafe </title></head>
    <body><font size = 4 color = "blue"> Welcome to Tuna Cafe Survey </font>
        <form action="TunaResult.php" method = "post">
            <?php
            $menu = array('Tuna Casserola', 'Tuna Sandwich', 'Tuna Pie', 'Grilled Tune',
                'Tuna Surprise');
            $best_seller = 2;
            print 'Please indicate all your favorite dishes <br>';
            for($i = 0; $i < count($menu);$i++){
                print "<input type = \"checkbox\" name = \"prefer[]\" value = $i> $menu[$i]";
                if($i == $best_seller){
                    print "<font color = red> Our Best Seller !!! </font>";
                }
                print "<br>";
            }
            ?>
            <input type ="submit" value ="submit">
            <input type ="reset" value ="reset">
        </form></body>
    
</html>
