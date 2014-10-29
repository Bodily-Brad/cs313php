<?php
    // Get Action
    if (isset($_GET["action"])) {
        $action = $_GET["action"];
    } elseif (isset($_POST["action"])) {
        $action = $_POST["action"];
    } else {
        $action = "none";
    }
    
    switch (strtolower($action))
    {
        case "teach":
            require_once $_SERVER["DOCUMENT_ROOT"]  . '/models/item.php';
            require_once $_SERVER["DOCUMENT_ROOT"]  . '/models/question.php';
            require_once $_SERVER["DOCUMENT_ROOT"]  . '/models/answer.php';
            require_once $_SERVER["DOCUMENT_ROOT"]  . '/models/response.php';
            
            $itemID = getVariable("itemID");
            $questionID = getVariable("questionID");
            $answerID = getVariable("answer");
            
            if (!empty($itemID) && !empty($questionID) && !empty($answerID))
            {
                Response::IncrementCount($itemID, $questionID, $answerID);
                $message = "Answer recorded. Thank you.<br>";
            }
                       
            // Get Random Item
            $items = Item::LoadAllFromDatabase();
            $itemID = mt_rand(0,count($items)-1);
            // Get random item's ItemID
            $itemID = $items[$itemID]->GetItemID();
            $itemID = Response::GetItemIDWithLowestResponseCount();             
            
            // Get random questionID
            $questions = Question::LoadAllFromDatabase();
            $questionID = mt_rand(0, count($questions)-1);
            $questionID = $questions[$questionID]->GetKey();
            $questionID = Response::GetQuestionIDWithLowestResponseCountForItem($itemID);
            
            $answers = Answer::LoadAllFromDatabase();
            include($_SERVER["DOCUMENT_ROOT"] . '/views/game/teach.php');
            break;             
        // Random Item - Random Question
        case "none":
        default:
            // Get Random Item
            require_once $_SERVER["DOCUMENT_ROOT"]  . '/models/item.php';
            require_once $_SERVER["DOCUMENT_ROOT"]  . '/models/question.php';
            require_once $_SERVER["DOCUMENT_ROOT"]  . '/models/answer.php';
            require_once $_SERVER["DOCUMENT_ROOT"]  . '/models/response.php';

            $items = Item::LoadAllFromDatabase();
            $itemID = mt_rand(0,count($items)-1);
            // Get random item's ItemID
            $itemID = $items[$itemID]->GetItemID();
            $itemID = Response::GetItemIDWithLowestResponseCount();                
            
            $questions = Question::LoadAllFromDatabase();
            $answers = Answer::LoadAllFromDatabase();
            include($_SERVER["DOCUMENT_ROOT"] . '/views/game/teach.php');
            break;                       
    }
?>
<?php
    function getVariable($variableName)
    {
        if (isset($_GET[$variableName])) {
            $value = $_GET[$variableName];
        } elseif (isset($_POST[$variableName])) {
            $value = $_POST[$variableName];
        } else {
            return false;
        }
        
        return $value;
    }
?>
