<!doctype html>
<html lang="en">
<!-- HEAD -->
<?php include $_SERVER['DOCUMENT_ROOT'] . '/includes/_head.php';  ?>
<body>
    <!-- HEADER -->
<?php include $_SERVER['DOCUMENT_ROOT'] . '/includes/_header.php';  ?>
        <h1><?php if (isset($message)) echo $message;?></h1>
        <p>
            Okay, here's the big moment... where you thinking of:
        </p>
        <h2><?=$guessItem->GetDescription()?></h2>
        <form method='post' action='/game/play/'>
            <input type='hidden' name='action' value='confirmGuess'>
            <input type='hidden' name='itemID' value='<?=$guessItem->GetItemID()?>'>
            <input type='submit' value='Yes'>
        </form>
        <form method='post' action='/game/play/'>
            <input type='hidden' name='action' value='denyGuess'>
            <input type='hidden' name='itemID' value='<?=$guessItem->GetItemID()?>'>
            <input type='submit' value='No'>
        </form>
        
        <a href="?action=End">Start Over</a>       
    <!-- Footer -->
<?php include $_SERVER['DOCUMENT_ROOT'] . '/includes/_footer.php';  ?>    
</body>
</html>
