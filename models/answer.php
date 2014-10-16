<?php
require_once('dbObject.php');
class Answer extends DBObject
{
    // Private variables
    private $text;
    
    // Protected Members
    protected static $tableName = 'answers';
    protected static $keyName = 'answerID';
    protected static $defaultSearchField = 'text';
    protected static $defaultSortField = 'answerID';  
    
    // Properties
    public function GetText() { return $this->text; }
    
    // Constructor
    function Answer($id = null, $text = null)
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