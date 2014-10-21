<?php
    // Retrieves all scriptures from the database as an array of records
    function getAllScriptures()
    {
        global $db;

        // Get all scriptures
        $query = "
            SELECT *
            FROM   scriptures
            ORDER BY book, chapter, verse";

        try {
            $statement = $db->prepare($query);
            $statement->execute();
            $results = $statement->fetchAll();
            $statement->closeCursor();
            return $results;
        } catch (PDOException $ex) {
            echo $ex->getMessage();
            exit;
        }

        // Else
        return false;
    }
    
    // Retrieves all topics from the database as an array of records
    function getAllTopics()
    {
        global $db;

        // Get all topics
        $query = "
            SELECT *
            FROM   topics
            ORDER BY name";

        try {
            $statement = $db->prepare($query);
            $statement->execute();
            $results = $statement->fetchAll();
            $statement->closeCursor();
            return $results;
        } catch (PDOException $ex) {
            echo $ex->getMessage();
            exit;
        }

        // Else
        return false;        
    }
    
    function getScripturesByTopic($topicName)
    {
        global $db;
        $query = "
            SELECT s.id, s.book, s.chapter, s.verse, s.content, t.name
            FROM scriptures as s
            INNER JOIN scripture_topic_lookup as stl ON stl.scripture_id = s.id
            INNER JOIN topics as t ON t.id = stl.topic_id
            WHERE t.name LIKE :topicName";

        try {
            $statement = $db->prepare($query);
            $statement->bindValue(':topicName', $topicName);
            $statement->execute();
            $results = $statement->fetchAll();
            $statement->closeCursor();
            return $results;
        } catch (Exception $ex) {
            echo $ex->getMessage();
        }

        // Else
        return false;        
    }
    
    // Retrieves all topics associates with a specific scripture as an array of records
    function getTopicsByScriptureID($scriptureId)
    {
        global $db;
        $query = "
            SELECT *
            FROM topics
            INNER JOIN scripture_topic_lookup
            ON scripture_topic_lookup.topic_id = topics.id
            WHERE scripture_topic_lookup.scripture_id = :id
            ORDER BY name";

        try {
            $statement = $db->prepare($query);
            $statement->bindValue(':id', $scriptureId);
            $statement->execute();
            $results = $statement->fetchAll();
            $statement->closeCursor();
            return $results;
        } catch (Exception $ex) {
            echo $ex->getMessage();
        }

        // Else
        return false;
    }   
    
    function insertScriptureWithTopics($book, $chapter, $verse, $content, $topicIDs)
    {
        global $db;
        $query = "
            INSERT INTO scriptures (book, chapter, verse, content)
            VALUES (:book, :chapter, :verse, :content)";
        
        // Insert scripture
        try {
            $statement = $db->prepare($query);
            $statement->bindValue(':book', $book);
            $statement->bindValue(':chapter', intval($chapter));
            $statement->bindValue(':verse', intval($verse));
            $statement->bindValue(':content', $content);
            
            $statement->execute();
            $newId = $db->lastInsertId();
            
            $statement->closeCursor();
            
            // Insert topics
            if (!empty($topicIDs))
            {
                foreach ($topicIDs as $topicID)
                {
                    insertScriptureTopicLink($newId, $topicID);
                }
            }
            
            return $newId;
        } catch (Exception $ex) {
            echo $ex->getMessage();
        }

        // Else
        return false;        
    }
    
    function insertTopic($name)
    {
        global $db;
        $query = "
            INSERT INTO topics (name)
            VALUES (:name)";
        
        // Insert scripture
        try {
            $statement = $db->prepare($query);
            $statement->bindValue(':name', $name);
            
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
    
    function insertScriptureTopicLink($scriptureID, $topicID)
    {
        global $db;
        $query = "
            INSERT INTO scripture_topic_lookup (scripture_id, topic_id)
            VALUES (:scripture_id, :topic_id)";
        
        // Insert scripture
        try {
            $statement = $db->prepare($query);
            $statement->bindValue(':scripture_id', intval($scriptureID));
            $statement->bindValue(':topic_id', intval($topicID));
            
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