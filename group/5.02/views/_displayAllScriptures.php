<article>
<h1>Scriptures</h1>
<?php
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
<br>
<a href="">Show All Scriptures</a>