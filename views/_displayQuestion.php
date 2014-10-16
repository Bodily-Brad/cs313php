<?php
// Requires $question to be set to Question object
require_once('../models/question.php');
if (!isset($question))
    $question = new Question();
?>    
<?=$question->GetKey()?>:<?=$question->GetText()?> <br>