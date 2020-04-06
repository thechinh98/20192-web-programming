<html>
    <head><title>Tuna Cafe</title></head>
    <?php
    $menu = array('Tuna Casserola', 'Tuna Sandwich', 'Tuna Pie', 'Grilled Tune',
        'Tuna Surprise');
    $prefer = filter_input(INPUT_POST,"prefer",FILTER_DEFAULT,FILTER_REQUIRE_ARRAY);
    if (count($prefer) == 0) {
        print 'Oh no! Please puck something as your favorite';
    } else {
        print'<br> Your selection were <ul>';
        foreach ($prefer as $item){
            print "<li>$menu[$item]</li>";
        }
        print '</ul>';
    }
    ?>
</html>


