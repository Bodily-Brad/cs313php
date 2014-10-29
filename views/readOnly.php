<!doctype html>
<html lang="en">
<!-- HEAD -->
<?php include $_SERVER['DOCUMENT_ROOT'] . '/includes/_head.php';  ?>
<body>
    <!-- HEADER -->
<?php include $_SERVER['DOCUMENT_ROOT'] . '/includes/_header.php';  ?>
    <h1>Game Menu</h1>
    <a href="/game/play/">Play The Game (in progress)</a>
    <h1>Read-Only Database Access</h1>
<?php include $_SERVER["DOCUMENT_ROOT"]  . '/views/_searchItemsForm.php'; ?>
<?php include $_SERVER["DOCUMENT_ROOT"]  . '/views/_searchQuestionsForm.php'; ?>
<?php include $_SERVER["DOCUMENT_ROOT"]  . '/views/_searchAnswersForm.php'; ?>
    <h1>Help Teach The Game</h1>
    <a href='/game/teach/' title='Teach the game'>Teach the game</a>
    <h1>Manage The Game</h1>
    <a href="manage/?action=ManageItems">Manage Items</a><br>
    <a href="manage/?action=ManageQuestions">Manage Questions</a><br>    
    <!-- Footer -->
<?php include $_SERVER['DOCUMENT_ROOT'] . '/includes/_footer.php';  ?>    
</body>
</html>
