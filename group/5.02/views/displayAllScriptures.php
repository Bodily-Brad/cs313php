<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" type="text/css" href="5.02.css" media="screen">        
        <title>Display Scriptures</title>
    </head>
    <body>
        <article>
            <h1>Scriptures</h1>
            <?php
            // Connection to db
            require_once('dbConnection.php');
            require_once('models/scriptures.php');

            if (isset($message))
                echo "<span class='message'>$message</span>";

            if (!empty($scriptures))
            {
                foreach ($scriptures as $scripture)
                {
                    $topics = getTopicsByScriptureID($scripture['id']);
                    include('_displayScripture.php');
                }
            }
            ?>
        </article>
    </body>
</html>
