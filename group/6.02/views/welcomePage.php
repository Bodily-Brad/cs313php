<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" type="text/css" href="6.02.css" media="screen">
        <title>6.02 Welcome Page</title>
    </head>
    <body>
        <h1>"Homepage"</h1>
        <?php
            if (!isset($username)) $username = "Nameless entity from beyond the stars(!?)";
        ?>
        Welcome, <?=$username?><br>
        <p>
            We wish there was more we could show you here, but... the assignment
            details made it sound like adding anything to this page could be
            problematic, so we've avoided anything extraneous - we just didn't
            want to risk causing any problems, you know?
        </p>
        <p>
            In the meantime, feel free to <a href="?action=logout">Sign Out</a>.
        </p>
    </body>
</html>
