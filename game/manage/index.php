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
        case "edittem":
            
            break;
        case "manageitems":
            require_once($_SERVER['DOCUMENT_ROOT'] . '/models/item.php');
            $items = Item::LoadAllFromDatabase();
            include $_SERVER['DOCUMENT_ROOT'] . '/views/manageItems.php';
            break;
        case "none":
        default:
            include $_SERVER['DOCUMENT_ROOT'] . '/views/management.php';
            break;                       
    }
?>
