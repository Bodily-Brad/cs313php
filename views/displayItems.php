<!doctype html>
<html lang="en">
<!-- HEAD -->
<?php include $_SERVER['DOCUMENT_ROOT'] . '/includes/_head.php';  ?>
<body>
    <!-- HEADER -->
<?php include $_SERVER['DOCUMENT_ROOT'] . '/includes/_header.php';  ?>
    <h1>Display Items</h1>
<?php include '../views/_searchItemsForm.php'; ?>
    <h2>Search Results</h2>
    <?php
        if (isset($message)) echo $message . '<br>';

        if (!empty($items))
        {
            echo "<ul>";
            foreach ($items as $item)
                echo "<li>" . $item->GetDescription() . "</li>";
            echo "</ul>";
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
