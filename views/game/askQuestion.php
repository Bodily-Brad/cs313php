<!doctype html>
<html lang="en">
<!-- HEAD -->
<?php include $_SERVER['DOCUMENT_ROOT'] . '/includes/_head.php';  ?>
<body>
    <!-- HEADER -->
<?php include $_SERVER['DOCUMENT_ROOT'] . '/includes/_header.php';  ?>
        <h1>Questions Left: <?=Game::GetQuestionsLeft()?></h1>
        <h2><?=$question->GetText()?></h2>
        <?php foreach ($answers as $answer):?>
            <form method='POST' action='/game/play/' style='display: inline-block'>
                <input type='hidden' name='action' value='answerQuestion'>
                <input type='hidden' name='answerID' value='<?=$answer->GetKey()?>'>
                <input type='hidden' name='questionID' value='<?=$question->GetKey()?>'>
                <input type='submit' value="<?=$answer->GetText()?>">
            </form>
        <?php endforeach; ?>
        <br><br>
        <a href="?action=End">End Game</a>
    <!-- Footer -->
<?php include $_SERVER['DOCUMENT_ROOT'] . '/includes/_footer.php';  ?>    
</body>
</html>
