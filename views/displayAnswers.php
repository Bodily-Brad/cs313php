<!doctype html>
<html lang="en">
<!-- HEAD -->
<?php include $_SERVER['DOCUMENT_ROOT'] . '/includes/_head.php';  ?>
<body>
    <!-- HEADER -->
<?php include $_SERVER['DOCUMENT_ROOT'] . '/includes/_header.php';  ?>
    <h1>Display Answers</h1>
<?php include '../views/_searchAnswersForm.php'; ?>
    <h2>Search Results</h2>
    <?php
        if (isset($message)) echo $message . '<br>';

        if (!empty($answers)):?>
            <table>
                <tr><th>Answer Text</th><tr>
                <?php foreach ($answers as $answer):?>
                    <tr><td><?php echo $answer->GetText(); ?></td></tr>
                <?php endforeach; ?>
            </table>
        <?php else: ?>
            No Items found.<br>
        <?php endif ?>
    <!-- Footer -->
<?php include $_SERVER['DOCUMENT_ROOT'] . '/includes/_footer.php';  ?>    
</body>
</html>
