<!doctype html>
<html lang="en">
<!-- HEAD -->
<?php include $_SERVER['DOCUMENT_ROOT'] . '/includes/_head.php';  ?>
<body>
    <!-- HEADER -->
<?php include $_SERVER['DOCUMENT_ROOT'] . '/includes/_header.php';  ?>
    <h1>What was your item?</h1>    
    <p><?php if (isset($message)) echo $message;?></p>
    
    <form method='post' action='/game/play/'>
        <input type='hidden' name='action' value='provideCorrectItem'>
        <?php foreach ($items as $item):?>
            <input type='radio' name='itemID' value='<?=$item->GetItemID()?>'><?php echo $item->GetDescription(); ?><br>
        <?php endforeach; ?> 
            <input type='submit' value='Submit'>
    </form>
    
    <a href="?action=End">Start Over</a>        
    <!-- Footer -->
<?php include $_SERVER['DOCUMENT_ROOT'] . '/includes/_footer.php';  ?>    
</body>
</html>
