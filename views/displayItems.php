<!doctype html>
<html lang="en">
<!-- HEAD -->
<?php include $_SERVER['DOCUMENT_ROOT'] . '/includes/_head.php';  ?>
<body>
    <!-- HEADER -->
<?php include $_SERVER['DOCUMENT_ROOT'] . '/includes/_header.php';  ?>
    <h1>Display Items</h1>
    <?php
        if (isset($message)) echo $message . '<br>';
    ?>
    <?php
    if (!empty($items))
    {
        foreach ($items as $item)
        include ('../views/_displayItem.php');
    }
    else
    {
        echo "No Items found.<br>";
    }
    ?>
    <!-- Footer -->
<?php include $_SERVER['DOCUMENT_ROOT'] . '/includes/_footer.php';  ?>    
</body>
</html>
