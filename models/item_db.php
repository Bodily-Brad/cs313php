<?php
require_once '../dbConnection.php';
require_once 'item.php';

// Create an Item Object from an Item Record
function Item_Record_to_Object($record)
{
    $var = new Item($record['itemID'], $record['description']);
    return $var;
}

// Retrieve an Item Object from the Database
function GetItem($itemId)
{
    $record = GetItem_Record($itemID);
    
    if (empty($record))
        return false;
    
    $object = Item_Record_to_Object($record);
    
    return $object;    
}

// Retrieve all Item objects from the Database
function GetItems()
{
    $records = GetItems_Records();
    $objects = array();
    foreach ($records as $record)
    {
        $object = Item_Record_to_Object($record);
        $objects[] = $object;
    }
    
    return $objects;   
}

// Retrieve an Item record from the database
function GetItem_Record($itemID)
{
    global $db;

    // Query String
    $query = "
        SELECT *
        FROM items
        WHERE itemID = :id";
    
    try
    {
        $statement = $db->prepare($query);
        $statement->bindValue(':id', $itemID);
        $statement->execute();
        $result = $statement->fetch();
        $statement->closeCursor();
        return $result;
    } catch (PDOException $ex) {
        echo $ex->getMessage();
        exit;
    }     
}

// Retrieve all Item records from the database
function GetItems_Records()
{
    global $db;
    
    $query = 
            "SELECT *
            FROM items";
    
    try {
        $statement = $db->prepare($query);
        $statement->execute();
        $results = $statement->fetchAll();
        $statement->closeCursor();
    } catch (PDOException $ex) {
        echo $ex->getMessage();
        exit;
    }
    
    if (!empty($results))
        return $results;
    return false;      
}
