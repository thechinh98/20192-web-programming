<html>
    <head><html> Coin Flip Result</html></head>
<body>
    <?php
    srand ((double) microtime() * 10000000);
    $flip = rand(1,0);
    $pick = filter_input(INPUT_GET, "pick");
    
    if($flip == 0 && $pick == 0){
        print "the flip = $flip, which is heads ! <br>";
        print'<font color = "blue"> you got it right </font>';
    } elseif($flip == 0 && $pick == 1) {
        print "The flip = $flip, which is heads! <br>";
        print '<font color = "red">You got it wrong </font>';
    } elseif($lip == 1 && $pick == 1){
        print "The flip = $flip, which is tails!";
        print '<font color = "blue"> You got it right! </font';
    }  else {
        print "The flip = $flip, which is tails";
        print '<font color = "red"> You got it wrong </font>';
    }
    ?>
</body>
</html>
