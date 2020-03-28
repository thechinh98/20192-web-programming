<html>
<head>
  <title>Sort</title>
  <style type="text/css">
    .container {
      width: 960px;
      margin: auto;
    }
    label {
      width: 24%;
      display: inline-block;
    }
    h1 { text-align: center; }
    input[type="submit"] { margin: auto; display: block; }
    table td {width: 25%;}
  </style>
</head>
<body>
  <h1>Sort</h1>
  <div class="container">
    <form action="sort.php" method="POST">
      <label>
          <input type="radio" name="sort_type" value="sort" <?php check('sort'); ?>/>
          Standard Sort
      </label>
      <label>
        <input type="radio" name="sort_type" value="rsort" <?php check('rsort'); ?>/>
        Reverse sort
      </label>
      <label>
        <input type="radio" name="sort_type" value="usort" <?php check('usort'); ?>/>
        User-defined sort
      </label>
      <label>
        <input type="radio" name="sort_type" value="ksort" <?php check('ksort'); ?>/>
        Key sort
      </label>
      <label>
        <input type="radio" name="sort_type" value="krsort" <?php check('krsort'); ?>/>
        Reverse key sort
      </label>
      <label>
        <input type="radio" name="sort_type" value="uksort" <?php check('uksort'); ?>/>
        User-defined key sort
      </label>
      <label>
        <input type="radio" name="sort_type" value="asort" <?php check('asort'); ?>/>
        Value sort
      </label>
      <label>
        <input type="radio" name="sort_type" value="arsort" <?php check('arsort'); ?>/>
        Reverse value sort
      </label>
      <label>
        <input type="radio" name="sort_type" value="uasort" <?php check('uasort'); ?>/>
        User-defined value sort
      </label>
      <br />
      <input type="submit" value="Sort" />
    </form>
    <?php 
    $values = array(
      'name' => 'Buzz Lightyear',
      'email_address' => 'buzz@starcommand.gal',
      'age' => 32,
      'smarts' => 'some'
    );
    $sorted_values = $values;
    if (is_post()) {
      $sort_type = $_POST['sort_type'];
      switch ($sort_type) {
      case 'usort':
      case 'uksort':
      case 'uasort':
        $sort_type($sorted_values, 'user_sort');
        break;
      default:
        $sort_type($sorted_values);
        break;
      } 
    }    
    ?>
    <table>
      <tbody>
        <tr>
          <td>Values unsorted (before sort):</td>
          <td>
            <ul>
            <?php foreach ($values as $key => $value) { ?>
              <li><strong><?php print $key; ?></strong>: <?php print $value; ?></li>
            <?php } ?>
            </ul>
          </td>
          <td>
            <?php if (is_post()) { ?>
            Values sorted with <?php print $sort_type; ?>:
            <?php } ?>
          </td>
          <td>
            <?php if (is_post()) { ?>
            <ul>
            <?php foreach ($sorted_values as $key => $value) { ?>
              <li><strong><?php print $key; ?></strong>: <?php print $value; ?></li>
            <?php } ?>
            </ul>
            <?php } ?>
          </td>
        </tr>
      </tbody>
    </table>
  </div>
</body>      
</html>
<?php 
  function user_sort($a, $b) {
    if ($b == 'smarts') {
      return 1;
    } else if ($b == 'smarts') {
      return -1;
    }
    
    return ($a == $b) ? 0 : (($a < $b) ? -1 : 1);
  }
  function is_post() {
    return $_SERVER["REQUEST_METHOD"] == 'POST';
  }
  function check($value) {
    if (!empty($_POST['sort_type'])) {
      if ($_POST['sort_type'] == $value) {
        print 'checked';
      }
    } elseif ($value == 'sort') {
      print ' checked';
    }
  }
?>