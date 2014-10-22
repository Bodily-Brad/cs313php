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

        if (!empty($items)):?>
            <table>
                <tr><th>Item Name</th><tr>
                <?php foreach ($items as $item):?>
                    <tr><td><?php echo $item->GetDescription(); ?></td></tr>
                <?php endforeach; ?>
            </table>
        <?php else: ?>
            No Items found.<br>
        <?php endif ?>
    <!-- Footer -->
<?php include $_SERVER['DOCUMENT_ROOT'] . '/includes/_footer.php';  ?>    
</body>
</html>
