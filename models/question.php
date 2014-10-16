<?php
require_once('dbObject.php');
class Question extends DBObject
{
    // Private variables
    private $text;
    
    // Protected Members
    protected static $tableName = 'questions';
    protected static $keyName = 'questionID';
    protected static $defaultSearchField = 'text';
    protected static $defaultSortField = 'text';  
    
    // Properties
    public function GetText() { return $this->text; }
    
    // Constructor
    function Question($id = null, $text = null)
    {
        $this->key = $id;
        $this->text = $text;
    }
    
    // Protected Methods
    protected static function createFromRecord($record)
    {
        if (!empty($record))
        {
            $instance = new self($record[static::$keyName], $record['text']);
            return $instance;
        }
        else
        {
            return false;
        }
    }    
}