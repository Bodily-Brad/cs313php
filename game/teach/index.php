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
        // Random Item - Random Question
        case "none":
        default:
            // Get Random Item
            require_once $_SERVER["DOCUMENT_ROOT"]  . '/models/item.php';
            require_once $_SERVER["DOCUMENT_ROOT"]  . '/models/question.php';
            require_once $_SERVER["DOCUMENT_ROOT"]  . '/models/answer.php';
            $items = Item::LoadAllFromDatabase();
            $questions = Question::LoadAllFromDatabase();
            $answers = Answer::LoadAllFromDatabase();
            include($_SERVER["DOCUMENT_ROOT"] . '/views/teach.php');
            break;                       
    }
?>
