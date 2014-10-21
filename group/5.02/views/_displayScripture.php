<?php
// Requires a $scripture record and a $topics array of topic records
?>
<section>
<?php
echo "<span class='scripturereference'>{$scripture['book']} {$scripture['chapter']}:{$scripture['verse']}</span>";
echo " - <span class='scriptureContent'>\"{$scripture['content']}\"</span><br>";

if (!empty($topics))
{
    $first = true;
    echo "<span class='topicsLabel'>Topics:</span> ";
    foreach ($topics as $topic)
    {
        if (!$first) echo ", ";
        echo "<a href='?action=ShowScripturesByTopic&topicName={$topic['name']}'>{$topic['name']}</a>";
        $first = false;
    }
    echo "<br>";
}
?>
</section>