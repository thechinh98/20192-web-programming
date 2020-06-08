<html>
  <head>
    <title>Login</title>
  </head>
  <body>
    <?php
      if (isset($_POST['logout'])) {
          session_destroy();
      }
      session_start();
      if (isset($_POST['username'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];
        if (isValidLogin($username, $password)) {
          $_SESSION['username'] = $username;
          echo "
            <form action='" . $_SERVER['PHP_SELF'] . "' method='POST'>
                <input type='hidden' name='logout' value='1'>
                <input type='submit' value='Log out'>
            </form>
          ";
        } else {
          echo "<font color ='red'>Invalid username or password!<font/>";
        }
      } else {
        echo "
          <form action='" . $_SERVER['PHP_SELF'] . "' method='POST'>
            Username: <input type='text' name='username'><br/>
            Password: <input type='password' name='password'><br/>
            <input type='submit' value='Log in'>
          </form>
        ";
      }
    ?>
  </body>
</html>

<?php
function isValidLogin($username, $password) {
  $host= '127.0.0.1';
  $user = 'test';
  $passwd = 'test';
  $database = 'test';
  $connect = mysqli_connect($host, $user, $passwd);
  $table_name = 'users';

  mysqli_select_db($connect, $database);
  $query = 'select * from users where username=' . $username ' and password=' . $password;
  $results = mysqli_query($connect, $query);
  mysqli_close($connect);
  if ($results) {
    $row = mysqli_fetch_row($results);
    if ($row) {
      return true;
    } else {
      return false;
    }
  } else {
    return false;
  }
}
?>
