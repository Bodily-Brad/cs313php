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
}