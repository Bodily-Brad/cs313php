<!doctype html>
<html lang="en">
<!-- HEAD -->
<?php include $_SERVER['DOCUMENT_ROOT'] . '/includes/_head.php';  ?>
<body>
    <!-- HEADER -->
<?php include $_SERVER['DOCUMENT_ROOT'] . '/includes/_header.php';  ?>
    <div class='gameFrame'>
        <div class='gameNote'>Teach the Game</div>
        <div class='gameUserInputArea'>
            If the item is...
            <div class='gameQuestion'><?=$item->GetDescription()?></div>
            ...and you were asked:
            <div class='gameQuestion'><?=$question->GetText()?></div>
            How would you answer?<br><br>
            <div class='gameButtonArea'>
                
                <?php foreach ($answers as $answer):?>
                    <form class='gameUserInput' method='POST' action='/game/teach/' style='display: inline-block'>
                        <input type='hidden' name='action' value='teach'>
                        <input type='hidden' name='itemID' value='<?=$item->GetItemID()?>'>
                        <input type='hidden' name='answer' value='<?=$answer->GetKey()?>'>
                        <input type='hidden' name='questionID' value='<?=$question->GetKey()?>'>
                        <input type='submit' value="<?=$answer->GetText()?>">
                    </form>
                <?php endforeach; ?>
                <br>
            </div>
        </div>
        <div class='gameNote'><a href="/game/play/?action=End">Ready to Play?</a></div>
    </div>    
    <!-- Footer -->
<?php include $_SERVER['DOCUMENT_ROOT'] . '/includes/_footer.php';  ?>    
</body>
</html>
