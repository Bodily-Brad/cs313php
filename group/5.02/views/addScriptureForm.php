<!DOCTYPE html>
<?php
    // Requires $scriptures as an array of scriptures
    // Requires $topics as an array of topics
    require_once('dbConnection.php');
    require_once('models/scriptures.php');    
?>
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" type="text/css" href="5.02.css" media="screen">
        <title>New Scripture Entry</title>
    </head>
    <body>
        <form method='post'>
            <h2>New Scripture Entry</h2>
            <label>Book: </label><input name="book" required><br><br>
            <label>Chapter: </label><input name="chapter" type="number" required><br><br>
            <label>Verse: </label><input name="verse" type="number" required><br><br>
            <label>Content: </label><textarea name="content" rows="5" cols="38" required></textarea><br><br>
            <label>Topic(s):</label><br>
            <?php
            if (empty($topics)) $topics = array();
                foreach ($topics as $topic):?>
                    <label></label><input type="checkbox" class="checkbox" name="topics[]" value="<?=$topic['id']?>"><?=$topic['name']?><br>
            <?php endforeach; ?>
            <label></label><input type='checkbox' class="checkbox" name='otherTopic' value='other'>Other <input name='otherTopicName'><br><br>
            <input type='hidden' name='action' value='addScripture'>
            <input type='submit' value='Add Scripture'>
        </form>
        <?php
include('_displayAllScriptures.php');
        ?>
    </body>
</html>

