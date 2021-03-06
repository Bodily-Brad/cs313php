<?php
require_once 'dbGG.php';
class DBObject
{
    // Protected Static Members
    protected static $tableName = 'table';
    protected static $keyName = 'key';
    protected static $defaultSearchField = 'search';
    protected static $defaultSortField = 'sort';
    // Protected Members
    protected $key;
    
    // Properties
    public function GetKey() { return $this->key; }
    
    // Public Methods
    public static function LoadFromDatabase($key)
    {
        $record = static::readRecord($key);
        if (!empty($record))
        {
            $object = static::createFromRecord($record);
            return $object;
        }
        else
        {
            return false;
        }
    }
    
    public static function LoadAllFromDatabase($excludedKeys = null)
    {
        $records = static::readRecords($excludedKeys);
        
        if (!empty($records))
        {
            $objects = array();
            foreach ($records as $record)
            {
                $object = static::createFromRecord($record);
                $objects[] = $object;
            }
            return $objects;
        }
        // Else
        return false;
    }
    
    public static function Search($criteria)
    {
        $records = static::searchRecords($criteria);
        if (!empty($records))
        {
            $objects = array();
            foreach ($records as $record)
            {
                $object = static::createFromRecord($record);
                $objects[] = $object;
            }
            return $objects;
        }
        // Else
        return false;
    }
    
    // Protected Methods
    protected static function createFromRecord($record)
    {
        return false;
    }

    protected static function readRecord($key)
    {
        global $db;

        // Query String
        $query = "
            SELECT *
            FROM     " . static::$tableName . "
            WHERE    " . static::$keyName . " = :key";
        
        try
        {
            $statement = $db->prepare($query);
            $statement->bindValue(':key', $key);
            $statement->execute();
            $result = $statement->fetch();
            $statement->closeCursor();
            return $result;
        } catch (PDOException $ex) {
            echo $ex->getMessage();
            exit;
        }        
    }
        
    protected static function readRecords($excludedKeys = null)
    {
        global $db;
        
        $query = "
            SELECT *
            FROM     " . static::$tableName;
            
        // Add clause for excluded keys, if necessary
        if (!empty($excludedKeys))
        {
            $query .= " WHERE " . static::$keyName . " NOT IN (";
            for ($i = 0; $i < count($excludedKeys); $i++)
            {
                $excludedKey = $excludedKeys[$i];
                $query .= $excludedKey;
                if (
                        (count($excludedKeys) > 1) && 
                        ($i < (count($excludedKeys)-1)))
                    $query .= ", ";
            }

            $query .= ")";
        }
        
        // Add sorting
        $query .= " ORDER BY " . static::$defaultSortField;

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
    
    protected static function searchRecords($criteria)
    {
        global $db;

        $query = 
            "SELECT *
            FROM     " . static::$tableName . "
            WHERE    " . static::$defaultSearchField . "
                LIKE :crit
            ORDER BY " . static::$defaultSortField;

        try {
            $statement = $db->prepare($query);
            $statement->bindValue(':crit', $criteria);
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
}