<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" type="text/css" href="6.02.css" media="screen">
        <title>6.02 - Sign-up Page</title>
    </head>
    <script>
        function checkPass() 
        {
            var pass = document.getElementById("pass").value;
            var digit = /\d+/.test(pass);

            if (digit && pass.length >= 7)
            {
                document.getElementById("warn1").style.visibility = "hidden";
            }
            else
            {
                document.getElementById("warn1").style.visibility = "visible";
            }
        }

        function checkCopy() 
        {
            var pass = document.getElementById("pass").value;
            var check = document.getElementById("check").value;

            if(check == pass)
            {
                document.getElementById("warn2").style.visibility = "hidden";
            }
            else
            {
                document.getElementById("warn2").style.visibility = "visible";
            }
        }

        function validate() 
        {
            var warn1 = document.getElementById("warn1").style.visibility;
            var warn2 = document.getElementById("warn2").style.visibility;

            if(warn1 == "hidden" && warn2 == "hidden")
            {
                return true;
            }
            else
            {
                return false;
            }
        }
    </script>
    <body>
        <h1>Sign-up Page</h1>
        <form  action="." method="POST" >
            <h2>Create New Account</h2>
            <?php
                if (isset($message)) echo "<span class='message'>$message</span><br>";
            ?>
            <label>Username:</label><input type='text' name="name"><br><br>
            <label></label><span id="warn1" style="color:red; visibility:hidden">** Must be at least 7 characters and contain a number</span><br>
            <label>Password:</label><input type="password" name="pass" id="pass" onkeyup="checkPass()"><br>
            <label>Re-Enter Password:</label><input type="password" onkeyup="checkCopy()" name="check" id="check"><br>
            <label></label><span id="warn2" style="color:red; visibility:hidden">** Passwords do not match</span><br><br>
            <input type='hidden' name='action' value='CreateUser'>
            <a href=".">Return to Sign-in Page</a>
            <input type="submit" onclick="return validate();" value="Create">
        </form>
    </body>
</html>
