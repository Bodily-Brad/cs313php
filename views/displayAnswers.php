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
    <?php if (isset($message)) echo $message . '<br>'; ?>
    <?php
    if (!empty($answers))
    {
        echo "<ul>";
        foreach ($answers as $answer)
            echo "<li>" . $answer->GetText() . "</li>";
        echo "</ul>";
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
