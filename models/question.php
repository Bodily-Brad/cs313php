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
    
    // Public Methods
    public static function GetQuestionExistsByText($text)
    {
        global $db;

        // Query String
        $query = "
            SELECT *
            FROM     " . static::$tableName . "
            WHERE    text LIKE :text";
        
        try
        {
            $statement = $db->prepare($query);
            $statement->bindValue(':text', $text);
            $statement->execute();
            $result = $statement->fetch();
            $statement->closeCursor();
            if (!empty($result)) return true;
        } catch (PDOException $ex) {
            return false;
        }      
    }
    
    public static function Insert($text)
    {
        global $db;
        $query = "
            INSERT INTO questions (text)
            VALUES (:text)";
        
        // Insert item
        try {
            $statement = $db->prepare($query);
            $statement->bindValue(':text', $text);
            
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
            $instance = new self($record[static::$keyName], $record['text']);
            return $instance;
        }
        else
        {
            return false;
        }
    }    
}