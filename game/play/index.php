<?php
    // Start session
    session_start();
    
    // Game Model
    require_once $_SERVER['DOCUMENT_ROOT'] . '/models/game.php';    
    
    // Get Action
    if (isset($_GET["action"])) {
        $action = $_GET["action"];
    } elseif (isset($_POST["action"])) {
        $action = $_POST["action"];
    } else {
        $action = "none";
    }
    
    // Special Actions
    switch (strtolower($action))
    {
        case strtolower("answerQuestion"):
            $questionID = getVariable("questionID");
            $answerID = getVariable("answerID");
            Game::RecordAnswer($questionID, $answerID);
            break;
        case "start":
            Game::StartNewGame();
            break;
        case "end":
            Game::EndGame();
            break;
        case strtolower("confirmGuess"):
            $itemID = getVariable("itemID");
            Game::FinishGameCorrect($itemID);
            break;
        case strtolower("denyGuess"):
            $itemID = getVariable("itemID");
            Game::FinishGameIncorrect();
            break;
        case strtolower("provideCorrectItem"):
            $itemID = getVariable("itemID");
            Game::RecordPlayerResponses($itemID);
            Game::EndGame();
            break;
    }
    
    $gameState = Game::GetGameState();
    switch ($gameState)
    {
        case Game::$GAMESTATE_STARTED:
            require_once $_SERVER['DOCUMENT_ROOT'] . '/models/question.php';
            require_once $_SERVER['DOCUMENT_ROOT'] . '/models/answer.php';

            $questionsRemaining = Game::GetQuestionsLeft();
            
            if ($questionsRemaining > 0)
            {
                $questions = Question::LoadAllFromDatabase();
                $questionID = mt_rand(0, count($questions)-1);
                $questionID = $questions[$questionID]->GetKey();

                $questionID = Game::GetRandomQuestionID();
            }
            if (!empty($questionID) && ($questionsRemaining > 0))
            {
                $question = Question::LoadFromDatabase($questionID);
                $answers = Answer::LoadAllFromDatabase();
                include $_SERVER['DOCUMENT_ROOT'] . '/views/game/askQuestion.php';
            }            
            else
            {
                // We're out of questions now
                $guessItemID = Game::AttemptSolve();
                $guessItem = Item::LoadFromDatabase($guessItemID);
                
                $message = "I'm out of questions, sorry.";
                include $_SERVER['DOCUMENT_ROOT'] . '/views/game/endGame.php';
            }
            break;
        
        case Game::$GAMESTATE_FINISH_CORRECT:
            Game::EndGame();
            $message = "Wow... I can't believe I guessed right.";
            include $_SERVER['DOCUMENT_ROOT'] . '/views/game/finishGame.php';
            break;
        case Game::$GAMESTATE_FINISH_INCORRECT:
            $excludedKeys = array();
            $excludedKeys[] = $itemID;
            $items = Item::LoadAllFromDatabase($excludedKeys);
            $message = "So, you beat me. I can't say I'm surprised, but let me "
                    . "know what you were thinking of, and I'll do better next time.";
            include $_SERVER['DOCUMENT_ROOT'] . '/views/game/pickItem.php';
            break;            
        case Game::$GAMESTATE_SOLVING:
            // For now, we're just going to start a new game
        default:
            require_once $_SERVER['DOCUMENT_ROOT'] . '/models/item.php';
            $items = Item::LoadAllFromDatabase();
            include $_SERVER['DOCUMENT_ROOT'] . '/views/game/newGame.php';
            break;
    }

    // Gets a passed variable
    function getVariable($variableName)
    {
        if (isset($_GET[$variableName])) {
            $return = $_GET[$variableName];
        } elseif (isset($_POST[$variableName])) {
            $return = $_POST[$variableName];
        } else {
            return NULL;
        }  
        
        return $return;
    }    
    
?>

