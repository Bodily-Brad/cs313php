<!doctype html>
<html lang="en">
<!-- HEAD -->
<?php include $_SERVER['DOCUMENT_ROOT'] . '/includes/_head.php';  ?>
<body>
    <!-- HEADER -->
<?php include $_SERVER['DOCUMENT_ROOT'] . '/includes/_header.php';  ?>
    <h1>Display Responses</h1>

    <h2>Search Results</h2>
    <?php if (isset($message)) echo $message . '<br>'; ?>
    <?php
    if (!empty($responses))
    {
        foreach ($responses as $response)
            include('../views/_displayResponse.php');
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
