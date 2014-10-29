<!doctype html>
<html lang="en">
<!-- HEAD -->
<?php include $_SERVER['DOCUMENT_ROOT'] . '/includes/_head.php';  ?>
<body>
    <!-- HEADER -->
<?php include $_SERVER['DOCUMENT_ROOT'] . '/includes/_header.php';  ?>
        <h1>Questions Left: <?=Game::GetQuestionsLeft()?></h1>
        <h2>Here's Your Question</h2>
        <?=$question->GetText()?><br>
        <h2>Select an Answer</h2>
        <a href="?action=End">End Game</a>
        <?php foreach ($answers as $answer):?>
            <input type='radio' name='answer' value='<?=$answer->GetKey()?>'><?=$answer->GetText()?><br>
        <?php endforeach; ?>
    <!-- Footer -->
<?php include $_SERVER['DOCUMENT_ROOT'] . '/includes/_footer.php';  ?>    
</body>
</html>
