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
    
    public static function GetItemExistsByDescription($description)
    {
        global $db;

        // Query String
        $query = "
            SELECT *
            FROM     " . static::$tableName . "
            WHERE    description LIKE :description";
        
        try
        {
            $statement = $db->prepare($query);
            $statement->bindValue(':description', $description);
            $statement->execute();
            $result = $statement->fetch();
            $statement->closeCursor();
            if (!empty($result)) return true;
        } catch (PDOException $ex) {
            return false;
        }      
    }
    
    public static function Insert($description)
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
            
            // Return new ID
            return $newId;
        } catch (Exception $ex) {
            echo $ex->getMessage();
        }

        // Else
        return false;         
    }    
    
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
}