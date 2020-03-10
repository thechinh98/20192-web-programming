<html>
    <head>
        <meta charset="UTF-8">
        <title>Thank you: Got your Input</title>
    </head>
    <body>
        <?php
        $email = filter_input(INPUT_POST, 'email');
        $contact = filter_input(INPUT_POST, 'contact');
        print("Your email address is $email");
        print("<br> Contact preference is $contact");
        ?>
    </body>
</html>

