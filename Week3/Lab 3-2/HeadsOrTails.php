<html>
    <head><title>Coin Flip!</title>
    <body>
        <font size ="4" color="blue">Please Pick Heads or Tails!</font>
        <form action="GotFlip.php" method="POST">
            <?php
            print "<INPUT TYPE = \"radio\" NAME = \"pick\" VALUE = 0 > HEADS";
            print "<INPUT TYPE = \"radio\" NAME = \"pick\" VALUE = 1 > TAILS";
            print "<BR>";
            ?>
            <INPUT TYPE="SUBMIT" value="Submit">
            <INPUT TYPE="RESET" value="Restart">
        </form>
    </body>
    </head>
</html>