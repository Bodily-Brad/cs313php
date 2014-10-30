<!doctype html>
<html lang="en">
<!-- HEAD -->
<?php include $_SERVER['DOCUMENT_ROOT'] . '/includes/_head.php';  ?>
<body>
    <!-- HEADER -->
<?php include $_SERVER['DOCUMENT_ROOT'] . '/includes/_header.php';  ?>
    <div class='gameFrame'>
        <div class='gameNote'>Were you thinking of...</div>
        <div class='gameUserInputArea'>
            <div class='gameQuestion'><?=$guessItem->GetDescription()?></div>
            <div class='gameButtonArea'>
                <form class='gameUserInput' method='post' action='/game/play/'>
                    <input type='hidden' name='action' value='confirmGuess'>
                    <input type='hidden' name='itemID' value='<?=$guessItem->GetItemID()?>'>
                    <input type='submit' value='Yes'>
                </form>
                <form class='gameUserInput' method='post' action='/game/play/'>
                    <input type='hidden' name='action' value='denyGuess'>
                    <input type='hidden' name='itemID' value='<?=$guessItem->GetItemID()?>'>
                    <input type='submit' value='No'>
                </form>                
                <br>
            </div>
        </div>
        <div class='gameNote'><a href="?action=End">Start Over</a></div>
    </div>     
    <!-- Footer -->
<?php include $_SERVER['DOCUMENT_ROOT'] . '/includes/_footer.php';  ?>    
</body>
</html>
