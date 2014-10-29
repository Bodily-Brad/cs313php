<?php
    // Start session
    session_start();
    
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
        case "none":
        default:
            include('../views/readOnly.php');
            break;                       
        case "searchanswers":
            require_once('../models/answer.php');            
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
            $answers = Answer::Search($description);            
            include('../views/displayAnswers.php');            
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
        case "searchquestions":
            require_once('../models/question.php');            
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
            $questions = Question::Search($description);            
            include('../views/displayQuestions.php');
            break;
        case "startnewgame":
            require_once $_SERVER['DOCUMENT_ROOT'] . '/models/item.php';
            $items = Item::LoadAllFromDatabase();
            include $_SERVER['DOCUMENT_ROOT'] . '/views/newGame.php';
            break;
    }
?>
