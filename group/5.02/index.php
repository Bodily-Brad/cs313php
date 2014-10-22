<!--
5.02 Control
-->
<?php
    // Connect to database
    require_once('dbConnection.php');
    require_once('models/scriptures.php');
    
    $db = loadDB();
    
    // Get Action
    if (isset($_GET["action"])) {
        $action = $_GET["action"];
    } elseif (isset($_POST["action"])) {
        $action = $_POST["action"];
    } else {
        $action = "showaddscriptureform";
    }
    
    switch (strtolower($action))
    {
        case "addscripture":
            // Get Values
            $book = getVariable("book");
            $chapter = getVariable("chapter");
            $verse = getVariable("verse");
            $content = getVariable("content");
            $topics = getVariable("topics");
            
            $otherTopic = getVariable("otherTopic");
            $otherTopicName = getVariable("otherTopicName");
            
            // See if we need to add a new topic
            if (isset($otherTopic) && ($otherTopicName != ""))
            {
                $newTopicID = insertTopic($otherTopicName);
                $topics[] = $newTopicID;
            }
            
            // function insertScriptureWithTopics($book, $chapter, $verse, $content, $topicIDs)
            insertScriptureWithTopics($book, $chapter, $verse, $content, $topics);
            
            $scriptures = getAllScriptures();
            include('views/addScriptureForm.php');
            break;
        default:
        case "showaddscriptureform":
            $scriptures = getAllScriptures();
            $topics = getAllTopics();            
            include('views/addScriptureForm.php');
            break;
        // Show scriptures by topic
        case "showscripturesbytopic":
            $topicName = getVariable("topicName");
            if ($topicName == "") $topicName = "%";
            $scriptures = getScripturesByTopic($topicName);
            if ($topicName != "%")
                $message = "Showing results for: $topicName";
            include('views/addScriptureForm.php');            
            break;
    }
    
    function getVariable($variableName)
    {
        if (isset($_GET[$variableName])) {
            $return = $_GET[$variableName];
        } elseif (isset($_POST[$variableName])) {
            $return = $_POST[$variableName];
        } else {
            return NULL;
        }  
        
        return $return;
    }
 
    
?>