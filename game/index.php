<?php
    // Get Action
    if (isset($_GET["action"])) {
        $action = $_GET["action"];
    } elseif (isset($_POST["action"])) {
        $action = $_POST["action"];
    } else {
        $action = "showsearchitems";
    }
    
    switch (strtolower($action))
    {
        case "none":
            break;
        case "showallitems":
            require_once('../models/item.php');
            $items = Item::LoadAllFromDatabase();
            include('../views/displayItems.php');            
            break;
        case "showallquestions":
            require_once('../models/question.php');
            $questions = Question::LoadAllFromDatabase();
            include('../views/displayQuestions.php');            
            break;            
        case "searchitems":

            require_once('../models/item.php');            
            if (isset($_GET["description"])) {
                $description = $_GET["description"];
            } elseif (isset($_POST["description"])) {
                $description = $_POST["description"];
            } else {
                $description = "";
            }
            
            if ($description != '')
                $message = "Searching for '$description'";
            else {
                $message = "Showing all items.";
            }
            $description .= "%";
            $items = Item::Search($description);            
            include('../views/displayItems.php');
            break;
        case "showsearchitems":
            include('../views/searchItemsForm.php');
            break;
        case "testq":
            require_once('../models/question.php');
            $test = Question::LoadAllFromDatabase();
            print_r($test) . "<br>";
            break;
    }
?>
