<!doctype html>
<html lang="en">
<!-- HEAD -->
<?php include $_SERVER['DOCUMENT_ROOT'] . '/includes/_head.php';  ?>
<body>
    <!-- HEADER -->
<?php include $_SERVER['DOCUMENT_ROOT'] . '/includes/_header.php';  ?>
    <h1>Display Questions</h1>
    <?php
        if (isset($message)) echo $message . '<br>';
    ?>
    <?php
    if (!empty($questions))
    {
        foreach ($questions as $question)
        include ('../views/_displayQuestion.php');
    }
    else
    {
        echo "No items found.<br>";
    }
    ?>
    <!-- Footer -->
<?php include $_SERVER['DOCUMENT_ROOT'] . '/includes/_footer.php';  ?>    
</body>
</html>
