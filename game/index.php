<!doctype html>
<?php require_once '../models/item_db.php'; ?>
<html lang="en">
<head>
  <meta charset="utf-8">
  <link rel="stylesheet" type="text/css" href="../style/bcb.css" media="screen">
  <title>BCBodily - CS 313</title>
</head>
<body>
<!-- Header -->
<?php include $_SERVER['DOCUMENT_ROOT'] . '/includes/_header.php';  ?>
    <h1>The Game</h1>
    <?php
        // Get Items
        $items = GetItems_Records();
        foreach ($items as $item)
        {
            echo "ItemID: " . $item.GetItemID() . "<br>";
        }        
    
    ?>

    <!-- Footer -->
<?php include $_SERVER['DOCUMENT_ROOT'] . '/includes/_footer.php';  ?>
</body>
</html>
