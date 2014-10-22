<!doctype html>
<html lang="en">
<!-- HEAD -->
<?php include $_SERVER['DOCUMENT_ROOT'] . '/includes/_head.php';  ?>
<body>
    <!-- HEADER -->
<?php include $_SERVER['DOCUMENT_ROOT'] . '/includes/_header.php';  ?>
    <h1>Display Questions</h1>
<?php include '../views/_searchQuestionsForm.php'; ?>
    <h2>Search Results</h2>
    <?php
        if (isset($message)) echo $message . '<br>';

        if (!empty($questions)):?>
            <table>
                <tr><th>Answer Text</th><tr>
                <?php foreach ($questions as $question):?>
                    <tr><td><?php echo $question->GetText(); ?></td></tr>
                <?php endforeach; ?>
            </table>
        <?php else: ?>
            No Items found.<br>
        <?php endif ?>
    <!-- Footer -->
<?php include $_SERVER['DOCUMENT_ROOT'] . '/includes/_footer.php';  ?>    
</body>
</html>
