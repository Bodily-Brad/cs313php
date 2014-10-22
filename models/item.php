<?php
require_once('dbObject.php');
class Item extends DBObject
{
    // Local Variables
    private $itemId;
    private $description;
    
    // Protected Members
    protected static $tableName = 'items';
    protected static $keyName = 'itemID';
    protected static $defaultSearchField = 'description';
    protected static $defaultSortField = 'description';      
    
    // Constructor
    function Item($itemId = null, $description = null)
    {
        $this->itemId = $itemId;
        $this->description = $description;
    }
    
    // Public Methods
    function GetItemID() { return $this->itemId; }
    function GetDescription() { return $this->description; }
    function SetDescription($description) { $this->description = $description; }
    
    // Protected Methods
    protected static function createFromRecord($record)
    {
        if (!empty($record))
        {
            $instance = new self($record[static::$keyName], $record['description']);
            return $instance;
        }
        else
        {
            return false;
        }
    }
    
    protected static function insert($description)
    {
        global $db;
        $query = "
            INSERT INTO items (description)
            VALUES (:description)";
        
        // Insert item
        try {
            $statement = $db->prepare($query);
            $statement->bindValue(':description', $description);
            
            $statement->execute();
            $newId = $db->lastInsertId();
            
            $statement->closeCursor();
            
            return $newId;
        } catch (Exception $ex) {
            echo $ex->getMessage();
        }

        // Else
        return false;         
    }
}