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
    
    // Public Methods    
    public static function GetResponseByCriteria($itemID, $questionID, $answerID)
    {
        global $db;

        // Query String
        $query = "
            SELECT *
            FROM     " . static::$tableName . "
            WHERE   itemID = :itemID
            AND     questionID = :questionID
            AND     answerID = :answerID";
        
        try
        {
            $statement = $db->prepare($query);
            $statement->bindValue(':itemID', $itemID);
            $statement->bindValue(':questionID', $questionID);
            $statement->bindValue(':answerID', $answerID);
            $statement->execute();
            $result = $statement->fetch();
            $statement->closeCursor();
            return static::createFromRecord($result);
        } catch (PDOException $ex) {
            return false;
        }      
    }    
    
    public static function GetResponseCount($itemID, $questionID, $answerID)
    {
        // Check for existing response
        $response = static::GetResponseByCriteria($itemID, $questionID, $answerID);
        if (!empty($response))
        {
            return $response->GetCount();
        }
        else
        {
            return 0;
        }        
    }
    
    public static function GetResponseExistsByCriteria($itemID, $questionID, $answerID)
    {
        global $db;

        // Query String
        $query = "
            SELECT *
            FROM     " . static::$tableName . "
            WHERE   itemID = :itemID
            AND     questionID = :questionID
            AND     answerID = :answerID";
        
        try
        {
            $statement = $db->prepare($query);
            $statement->bindValue(':itemID', $itemID);
            $statement->bindValue(':questionID', $questionID);
            $statement->bindValue(':answerID', $answerID);
            $statement->execute();
            $result = $statement->fetch();
            $statement->closeCursor();
            if (!empty($result)) return true;
        } catch (PDOException $ex) {
            return false;
        }      
    }
    
    public static function IncrementCount($itemID, $questionID, $answerID)
    {
        // Check for existing response
        $response = static::GetResponseByCriteria($itemID, $questionID, $answerID);
        if (!empty($response))
        {
            $count = $response->GetCount();
            $count++;
            return static::update($response->GetKey(), $count);
        }
        else
        {
            $count = 1;
            return static::insert($itemID, $questionID, $answerID, $count);
        }
    }
    
 
    
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
    
    public static function insert($itemID, $questionID, $answerID, $count)
    {
        global $db;
        $query = "
            INSERT INTO " . static::$tableName . " (itemID, questionID, answerID, count)
            VALUES (:itemID, :questionID, :answerID, :count)";
        
        // Insert item
        try {
            $statement = $db->prepare($query);
            $statement->bindValue(':itemID', $itemID);
            $statement->bindValue(':questionID', $questionID);
            $statement->bindValue(':answerID', $answerID);
            $statement->bindValue(':count', $count);
            
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
    
    protected static function update($ID, $count)
    {
        global $db;
        $query = "
            UPDATE " . static::$tableName . "
            SET count = :count
            WHERE responseID = :responseID";
        
        // Insert item
        try {
            $statement = $db->prepare($query);
            $statement->bindValue(':count', $count);
            $statement->bindValue(':responseID', $ID);
            $statement->execute();            
            $statement->closeCursor();
            
            // Return new ID
            return true;
        } catch (Exception $ex) {
            echo $ex->getMessage();
        }

        // Else
        return false;         
    }     
}