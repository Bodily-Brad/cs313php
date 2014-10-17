<?php
// Requires $question to be set to Response object
require_once('../models/response.php');
if (!isset($response))
    $response = new Response();
?>    
<h3><?=$response->GetText()?></h3>
AnswerID: <?=$response->GetAnswerID()?>
ItemID: <?=$response->GetItemID()?>
QuestionID: <?=$response->GetQuestionID()?>
Count: <?=$response->GetCount()?>
<br>
