<?php session_start()?>
<?php
    // Get Action
    if (isset($_GET["action"])) {
        $action = $_GET["action"];
    } elseif (isset($_POST["action"])) {
        $action = $_POST["action"];
    } else {
        $action = "vote";
    }

    $aimResults = $funnyResults = $smartResults = $toughResults = "";
    switch (strtolower($action))
    {
        // Reset results
        case "reset":
            createNewPoll($aimResults, $funnyResults, $smartResults, $toughResults);
            readPoll($aimResults, $funnyResults, $smartResults, $toughResults);
            include 'views/results.php';            
            break;
        case "resetsession":
            // Clear voted session flag
            unset($_SESSION["2.03-VOTED"]);
            include 'views/poll.php';
            break;
        // Handle votes
        case "submitvote":
            if (!isset($_SESSION["2.03-VOTED"]))
            {
                // Get Votes
                $aim = $funny = $smart = $tough = "";
                if (isset($_POST["aim"]))   $aim    = $_POST["aim"];
                if (isset($_POST["funny"])) $funny  = $_POST["funny"];
                if (isset($_POST["smart"])) $smart  = $_POST["smart"];
                if (isset($_POST["tough"])) $tough  = $_POST["tough"];

                // This is more work than is strictly necessary, but it keeps the poll
                // file from potentially gaining new fields by only incrementing votes for
                // qualified options.
                readPoll($aimResults, $funnyResults, $smartResults, $toughResults);

                // Handle Aim Vote
                switch ($aim)
                {
                    case "Clint":
                    case "Legolas":
                    case "Robin":
                    case "Ralph":
                        $aimResults[$aim] += 1;
                        break;
                }

                // Handle Funny Vote
                switch ($funny)
                {
                    case "Troy":
                    case "Michael":
                    case "Philip":
                    case "Jim":
                        $funnyResults[$funny] += 1;
                        break;
                }

                // Handle Smart Vote
                switch ($smart)
                {
                    case "Reginald":
                    case "Sherlock":
                    case "Red":
                    case "Michael":
                        $smartResults[$smart] += 1;
                        break;
                }

                // Handle Tough Vote
                switch ($tough)
                {
                    case "Fezzik":
                    case "He-Man":
                    case "Teal'c":
                    case "Worf":
                        $toughResults[$tough] += 1;
                        break;
                }

                if ($aim != "" && $funny != "" & $smart != "" && $tough != "")
                {            
                    // Save new results
                    savePoll($aimResults, $funnyResults, $smartResults, $toughResults);
                    // Mark as voted
                    $_SESSION["2.03-VOTED"] = true;
                    // Set message
                    $resultsMessage = "Thank you for voting.";
                    // This read isn't necessary, but in trying to "modlarize" the reading/
                    // viewing of results...
                    readPoll($aimResults, $funnyResults, $smartResults, $toughResults);
                    include 'views/results.php';     
                } else {
                    if ($aim == "") $aimMessage = "Please select an option.";
                    if ($funny == "") $funnyMessage = "Please select an option.";
                    if ($smart == "") $smartMessage = "Please select an option.";
                    if ($tough == "") $toughMessage = "Please select an option.";

                    include 'views/poll.php';                
                }
            } else {
                readPoll($aimResults, $funnyResults, $smartResults, $toughResults);
                $resultsMessage = "You have already voted in this poll.";
                include 'views/results.php';                
            }
            break;
        case "vote":
            if (!isset($_SESSION["2.03-VOTED"])) {
                include 'views/poll.php';
            } else {
                readPoll($aimResults, $funnyResults, $smartResults, $toughResults);
                $resultsMessage = "You have already voted in this poll.";
                include 'views/results.php';
            }
            break;        
        // View results
        case "view":
        default:        // Redundant, but just in case
            readPoll($aimResults, $funnyResults, $smartResults, $toughResults);
            include 'views/results.php';
            break;
    }    
    
    function createNewPoll(&$aimResults, &$funnyResults, &$smartResults, &$toughResults)
    {
        // Create base results
        $aimResults = array("Clint"=>0, "Legolas"=>0, "Robin"=>0, "Ralph"=>0);
        $funnyResults = array("Troy"=>0, "Michael"=>0, "Philip"=>0, "Jim"=>0);
        $smartResults = array("Reginald"=>0, "Sherlock"=>0, "Red"=>0, "Michael"=>0);
        $toughResults = array("Fezzik"=>0, "He-Man"=>0, "Teal'c"=>0, "Worf"=>0);
        
        // Save to file
        savePoll($aimResults, $funnyResults, $smartResults, $toughResults);
    }
        
    function readPoll(&$aimResults, &$funnyResults, &$smartResults, &$toughResults)
    {
        $filename = "pollresults.txt";
        $file = fopen($filename, "r") or die("Error");
        $aimResults = unserialize(fgets($file));
        $funnyResults = unserialize(fgets($file));
        $smartResults = unserialize(fgets($file));
        $toughResults = unserialize(fgets($file));    
        fclose($file);        
    }
    
    function savePoll($aimResults, $funnyResults, $smartResults, $toughResults)
    {
        $filename = "pollresults.txt";
        $file = fopen($filename, "w");
        fwrite($file, serialize($aimResults) . "\n");
        fwrite($file, serialize($funnyResults) . "\n");
        fwrite($file, serialize($smartResults) . "\n");
        fwrite($file, serialize($toughResults) . "\n");
        fclose($file);        
    }
        
   
?>
