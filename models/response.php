<?php
require_once('dbObject.php');
class Response extends DBObject
{
    // Private variables
    private $itemID;
    private $questionID;
    private $answerID;
    private $count;
    
    // Protected Members
    protected static $tableName = 'responses';
    protected static $keyName = 'responseID';
    protected static $defaultSearchField = 'responseID';
    protected static $defaultSortField = 'responseID';  
    
    
    // Constructor
    function Response(
            $id = null,
            $itemID = null,
            $questionID = null,
            $answerID = null,
            $count = 0)
    {
        $this->key = $id;
        $this->itemID = $itemID;
        $this->questionID = $questionID;
        $this->answerID = $answerID;
        $this->count = $count;
    }
    
    // Propeties
    public function GetAnswerID() { return $this->answerID; }
    public function GetCount() { return $this->count; }
    public function GetItemID() { return $this->itemID; }
    public function GetQuestionID() { return $this->questionID; }
    
    
    // Protected Methods
    protected static function createFromRecord($record)
    {
        if (!empty($record))
        {
            $instance = new self($record[static::$keyName],
                    $record['itemID'],
                    $record['questionID'],
                    $record['answerID'],
                    $record['count']);
            return $instance;
        }
        else
        {
            return false;
        }
    }    
}