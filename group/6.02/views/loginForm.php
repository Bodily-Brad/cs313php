<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" type="text/css" href="6.02.css" media="screen">
        <title>6.02 Sign-in Page</title>
    </head>
    <body>
        <h1>Sign-in Page</h1>
        <form method="POST" action='.'>
            <h2>Existing User</h2>
            <?php
                if (isset($message)) echo "<span class='message'>$message</span><br>";
            ?>            
            <label>Username:</label><input type="text" name="username" value="<?php if (isset($username)) echo $username; else echo ""; ?>" required><br>
            <label>Password:</label><input type="password" name="password" required><br>
            <br>
            <label>New User?</label> <a href="?action=SignUp">Create a New Account</a>
            <input type="hidden" name="action" value="Login">
            <input type="submit" value="Login">
        </form>       
    </body>
</html>
