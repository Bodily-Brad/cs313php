<!doctype html>
<html lang="en">
<!-- HEAD -->
<?php include $_SERVER['DOCUMENT_ROOT'] . '/includes/_head.php';  ?>
<body>
    <!-- HEADER -->
<?php include $_SERVER['DOCUMENT_ROOT'] . '/includes/_header.php';  ?>
    <div class='gameFrame'>
        <div class='gameNote'>You Win</div>
        <div class='gameUserInputArea'>
            <div class='gameInstructions'>
                <p><?php if (isset($message)) echo $message;?></p>           
            </div>
            <div class='gameItemList'>
                <form class='gameUserInput' method='post' action='/game/play/'>
                    <input type='hidden' name='action' value='provideCorrectItem'>
                    <ul>
                        <?php foreach ($items as $item):?>
                        <li>
                            <input type='radio' name='itemID' value='<?=$item->GetItemID()?>'><?php echo $item->GetDescription(); ?>
                        </li>
                        <?php endforeach; ?>                    
                    </ul>                    
                    <br>
                    <input type='submit' value='Submit'>
                </form>
            </div>            
        </div>
        <div class='gameNote'><a href="?action=End">Start Over</a></div>
    </div>   
            
    <!-- Footer -->
<?php include $_SERVER['DOCUMENT_ROOT'] . '/includes/_footer.php';  ?>    
</body>
</html>
