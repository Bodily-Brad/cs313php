<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/models/question.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/models/answer.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/models/item.php';

class Game
{
    // Class variables
    protected static $GAMESTATE_KEY = "gamestate";
    public static $GAMESTATE_STARTED = "GAMESTATE_STARTED";
    public static $GAMESTATE_SOLVING = "GAMESTATE_SOLVING";
    
    protected static $QUESTIONS_LEFT_KEY = "questionsLeft";
    protected static $QUESTIONS_LIST_KEY = "questionsAnswered";
    protected static $STARTING_QUESTIONS = 20;
    
    // "Properties"
    static function GetGameState() { if (isset($_SESSION["gamestate"])) return $_SESSION["gamestate"]; return false; }
    private static function setGameState($value) { $_SESSION[static::$GAMESTATE_KEY] = $value; }
    
    static function GetQuestionsLeft() {if (isset($_SESSION[static::$QUESTIONS_LEFT_KEY])) return $_SESSION[static::$QUESTIONS_LEFT_KEY]; return false; }
    static function SetQuestionsLeft($value) { $_SESSION[static::$QUESTIONS_LEFT_KEY] = $value; }
    
    static function GetQuestionsAnswered() {if (isset($_SESSION[static::$QUESTIONS_LIST_KEY])) return $_SESSION[static::$QUESTIONS_LIST_KEY]; return false; }
    private static function setQuestionsAnswered($value) { $_SESSION[static::$QUESTIONS_LIST_KEY] = $value; }
    
    // Methods
    static function AttemptSolve()
    {
        static::setGameState(static::$GAMESTATE_SOLVING);
        
        // Crazy brute method for now
        $items = Item::LoadAllFromDatabase();
        
        $confidences = array();
        foreach ($items as $item)
        {
            $confidences[$item->GetItemID()] = 0;
            
            // Iterate through questions in answered questions array
            $confidences[$item->GetItemID()] = Response::GetResponseCount($item->GetItemID(), $questionID, $answerID);
        }
        
        return $confidences;
    }
    
    static function EndGame()
    {
        // Clear Session variables
        unset($_SESSION[static::$GAMESTATE_KEY]);
        unset($_SESSION[static::$QUESTIONS_LEFT_KEY]);
        unset($_SESSION[static::$QUESTIONS_LIST_KEY]);
    }
    
    static function GetRandomQuestionID()
    {
        $askedQuestions = static::GetQuestionsAnswered();
        $questionIDs = array();
        if (!empty($askedQuestions))
        {
            foreach ($askedQuestions as $askedQuestion)
                if (!in_array($askedQuestion['question'], $questionIDs))
                    $questionIDs[] = $askedQuestion['question'];
        }
        
        // Try reading exclusions
        $questions = Question::LoadAllFromDatabase($questionIDs);
        
        if (!empty($questions))
        {
            $questionID = mt_rand(0, count($questions)-1);
            $questionID = $questions[$questionID]->GetKey();
            return $questionID;            
        }
        
        return false;
    }
    
    static function RecordAnswer($questionID, $answerID)
    {
        $questionsAnswered = static::GetQuestionsAnswered();
        $answerPair = array();
        $answerPair['answer'] = $answerID;
        $answerPair['question'] = $questionID;
        $questionsAnswered[] = $answerPair;
        
        static::setQuestionsAnswered($questionsAnswered);
        static::SetQuestionsLeft(static::GetQuestionsLeft()-1);
    }
    
    static function StartNewGame()
    {
        // End game first, just to be safe
        static::EndGame();
        
        // Set Session variable
        static::setGameState(static::$GAMESTATE_STARTED);
        static::SetQuestionsLeft(static::$STARTING_QUESTIONS);
    }

    
    
    }