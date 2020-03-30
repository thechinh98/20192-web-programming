<html>
  <head>
    <title>Guess a number</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
  </head>
  <body>
    <h1>Guess a number</h1>
    <?php
      if (array_key_exists('result', $_POST)) {
        $result = $_POST['result'];
      } else {
        srand ((double) microtime() * 10000000);
        $result = rand(0, 100);
      }
      if (array_key_exists('guess', $_POST)) {
        $guess = $_POST['guess'];
      } else {
        $guess = '';
      }
      if (array_key_exists('count', $_POST)) {
        $count = $_POST['count'] + 1;
      } else {
        $count = 0;
      }
    ?>
    <?php print $result ?>
    <form action="<?php print $_SERVER['PHP_SELF'];?>" method="post">
      <input type="text" name="result" value="<?php print $result ?>" style="display: none;">
      <input type="text" name="count" value="<?php print $count ?>" style="display: none;">
      <table>
        <tr>
          <td>Your guess:</td>
          <td>
            <input type="text" name="guess" value="<?php print $guess; ?>">
          </td>
        </tr>
        <?php if ($guess !== ''): ?>
          <tr>
            <td>
              <?php
                if (is_numeric($guess)) {
                  if ($guess == $result) {
                    print "You are correct!";
                  } elseif ($guess < $result) {
                    print "Wrong. Please try a higher number!";
                  } else {
                    print "Wrong. Please try a lower number!";
                  }
                } else {
                  print "You must enter a number!";
                }
              ?>
            </td>
          </tr>
        <?php endif; ?>
        <tr>
          <td>You have guessed:</td>
          <td>
            <?php echo $count, " times" ?>
          </td>
        </tr>
        <tr>
          <td align="right">
            <input type="submit" value="Submit">
          </td>
          <td align="left">
            <input type="reset" value="Reset">
          </td>
        </tr>
      </table>
    </form>
  </body>
</html>