<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form receiver</title>
</head>
<body>
    <p>Thank you, got your input</p>
    <?php
        $fullname = $_POST['fullname'];
        $class = $_POST ['class'];
        $university = $_POST['university'];
        $gender = $_POST ['gender'];
        $birthday = $_POST ['birthday'];
        
        print("<p>Hello $fullname, you are studying at $class, $university </p>");
        print("<p>Your gender is $gender</p>");
        print ("<p>Your birthday is $birthday</p>");
       
        print("<p>Your hobby: </p>");
        foreach($_POST['checkboxname'] as $value) {
            print("<p>$value</p>");
        }
    ?>