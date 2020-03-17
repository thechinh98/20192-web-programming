<html>
    <head><title>Conditional test</title></head>
    <body>
    <?php
    $first = $_GET["firstName"]; $middle = $_GET["middleName"]; $last = $_GET["lastName"];
    print("hi $first! Your full name is $last $middle $first.<br></br>"); 
    if($first == $last){
        print("$first and $last are equal");
    }
    if($first < $last){
        print("$first is less than $last");
    } 
    if($first > $last){
        print("$first is more than $last");
    }
    print("<br><br>");
    
    $grade1 = $_GET["grade1"]; $grade2 = $_GET["grade2"];
    $final = (2 * $grade1 + 3 * $grade2)/5;
    if($final > 89){
        print("Your final score is $final. You got an A. Congrats!");
    } elseif($final >79){
        print("Your final score is $final. You got an B. Congrats!");
    } elseif($final > 69){
        print("Your final score is $final. You got an C. Congrats!");
    } elseif($final > 59){
        print("Your final score is $final. You got an D. Congrats!");
    } elseif($final >=0){
        print("Your final score is $final. You got an D. Congrats!");
    } else {
        print("Illegal grade less than 0. Final grade = $final");
    }     
    ?>
    </body>
</html>
