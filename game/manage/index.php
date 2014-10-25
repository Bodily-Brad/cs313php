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
        case "addnewitem":
            require_once($_SERVER['DOCUMENT_ROOT'] . '/models/item.php');            
            $itemDescription = getVariable("itemDescription");
            if (!empty($itemDescription))
            {
                // Check if item already exists
                $itemExists = Item::GetItemExistsByDescription($itemDescription);
                if (!$itemExists)
                {
                    $newID = Item::Insert($itemDescription);
                    if (!empty($newID))
                        $message = "$itemDescription successfully added.";
                    else
                        $message = "$itemDescription NOT added.";
                }
                else
                {
                    $message = "$itemDescription already exists.";
                }
            }
            $items = Item::LoadAllFromDatabase();
            include $_SERVER['DOCUMENT_ROOT'] . '/views/manageItems.php';             
            break;
        case "addnewquestion":
            require_once($_SERVER['DOCUMENT_ROOT'] . '/models/question.php');            
            $questionText = getVariable("questionText");
            if (!empty($questionText))
            {
                // Check if question already exists
                $exists = Question::GetQuestionExistsByText($questionText);
                if (!$exists)
                {
                    $newID = Question::Insert($questionText);
                    if (!empty($newID))
                        $message = "'$questionText' successfully added.";
                    else
                        $message = "'$questionText' NOT added.";
                }
                else
                {
                    $message = "'$questionText' already exists.";
                }
            }
            $questions = Question::LoadAllFromDatabase();
            include $_SERVER['DOCUMENT_ROOT'] . '/views/manageQuestions.php';           
            break;            
        case "manageitems":
            require_once($_SERVER['DOCUMENT_ROOT'] . '/models/item.php');
            $items = Item::LoadAllFromDatabase();
            include $_SERVER['DOCUMENT_ROOT'] . '/views/manageItems.php';
            break;
        case "managequestions":
            require_once($_SERVER['DOCUMENT_ROOT'] . '/models/question.php');
            $questions = Question::LoadAllFromDatabase();
            include $_SERVER['DOCUMENT_ROOT'] . '/views/manageQuestions.php';
            break;
        case "none":
        default:
            include $_SERVER['DOCUMENT_ROOT'] . '/views/management.php';
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
