<!doctype html>
<html lang="en">
<!-- HEAD -->
<?php include $_SERVER['DOCUMENT_ROOT'] . '/includes/_head.php';  ?>
<body>
    <!-- HEADER -->
<?php include $_SERVER['DOCUMENT_ROOT'] . '/includes/_header.php';  ?>
    <div class='gameFrame'>
        <div class='gameNote'>Questions Left: <?=Game::GetQuestionsLeft()?></div>
        <div class='gameUserInputArea'>
            <div class='gameQuestion'><?=$question->GetText()?></div>
            <div class='gameButtonArea'>
                <?php foreach ($answers as $answer):?>
                    <form class='gameUserInput' method='POST' action='/game/play/' style='display: inline-block'>
                        <input type='hidden' name='action' value='answerQuestion'>
                        <input type='hidden' name='answerID' value='<?=$answer->GetKey()?>'>
                        <input type='hidden' name='questionID' value='<?=$question->GetKey()?>'>
                        <input type='submit' value="<?=$answer->GetText()?>">
                    </form>
                <?php endforeach; ?>
                <br>
            </div>
        </div>
        <div class='gameNote'><a href="?action=End">Start Over</a></div>
    </div>
    <!-- Footer -->
<?php include $_SERVER['DOCUMENT_ROOT'] . '/includes/_footer.php';  ?>    
</body>
</html>
