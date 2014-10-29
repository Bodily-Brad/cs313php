<!doctype html>
<html lang="en">
<!-- HEAD -->
<?php include $_SERVER['DOCUMENT_ROOT'] . '/includes/_head.php';  ?>
<body>
    <!-- HEADER -->
<?php include $_SERVER['DOCUMENT_ROOT'] . '/includes/_header.php';  ?>
    <h1>Teach the Game</h1>
    <?php if (isset($message)) echo $message . '<br>'; ?>    
    <?php
    

    
    $questionID = mt_rand(0, count($questions)-1);
    $questionID = $questions[$questionID]->GetKey();
    
    $item = Item::LoadFromDatabase($itemID);
    $question = Question::LoadFromDatabase($questionID);
    ?>
        Here's your item:
        <h2><?=$item->GetDescription()?></h2>
        Here's your question:
        <h2><?=$question->GetText() ?></h2>
        What's the answer?<br>
        <?php foreach ($answers as $answer):?>
            <form method='POST' action='/game/teach/' style='display: inline-block'>
                <input type='hidden' name='action' value='teach'>
                <input type='hidden' name='itemID' value='<?=$item->GetItemID()?>'>
                <input type='hidden' name='answer' value='<?=$answer->GetKey()?>'>
                <input type='hidden' name='questionID' value='<?=$question->GetKey()?>'>
                <input type='submit' value="<?=$answer->GetText()?>">
            </form>
        <?php endforeach; ?>

    
    <!-- Footer -->
<?php include $_SERVER['DOCUMENT_ROOT'] . '/includes/_footer.php';  ?>    
</body>
</html>
