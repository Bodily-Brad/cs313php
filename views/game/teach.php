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
    
    // Slow random for non-sequential
    $itemID = mt_rand(0,count($items)-1);
    // Get random item's ItemID
    $itemID = $items[$itemID]->GetItemID();
    
    $questionID = mt_rand(0, count($questions)-1);
    $questionID = $questions[$questionID]->GetKey();
    
    $item = Item::LoadFromDatabase($itemID);
    $question = Question::LoadFromDatabase($questionID);
    ?>
    <form action='/game/teach/'>
        <label>Here's your item: </label> <?=$item->GetDescription()?><br><br>
        <label>Here's your question: </label> <?=$question->GetText() ?><br><br>
        <label>What's the answer?</label><br><br>
        <?php
            foreach ($answers as $answer):
        ?><input type='radio' name='answer' value='<?=$answer->GetKey()?>'><?=$answer->GetText()?><br>
            <?php endforeach; ?>
        <br>
        <input type='hidden' name='itemID' value='<?=$item->GetItemID()?>'>
        <input type='hidden' name='questionID' value='<?=$question->GetKey()?>'>
        <input type='hidden' name='action' value='teach'>
        <input type='submit' value='Submit Answer'>
    </form>
    
    <!-- Footer -->
<?php include $_SERVER['DOCUMENT_ROOT'] . '/includes/_footer.php';  ?>    
</body>
</html>