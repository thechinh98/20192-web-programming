<html>
    <head><title>Receiving input</title></head>
    <body>
        <font size =5>Thank you: Got your input.</font>
        <?php
            $email = filter_input(INPUT_POST, 'email');
            $contact = filter_input(INPUT_POST, 'contact');
            print ("<br>Your email address is $email");
            print ("<br>Contact preference is $contact");
        ?>
    </body>
</html>