<article>
<h1>Scriptures</h1>
<?php
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