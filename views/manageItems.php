<!doctype html>
<html lang="en">
<!-- HEAD -->
<?php include $_SERVER['DOCUMENT_ROOT'] . '/includes/_head.php';  ?>
<body>
    <!-- HEADER -->
<?php include $_SERVER['DOCUMENT_ROOT'] . '/includes/_header.php';  ?>
    <h1>Item Management</h1>
    <?php if (isset($message)) echo $message . '<br>'; ?>
    <h2>Add Items</h2>
    <form action="/game/manage/" method="POST">
        <label>Description</label><input type='text' name='itemDescription' required>
        <input type="hidden" name="action" value="addNewItem">
        <input type='submit' value='Add Item'>
    </form>
    <h2>List Items</h2>
    <?php
        if (!empty($items)):?>
            <table>
                <tr><th>Item Name</th><tr>
                <?php foreach ($items as $item):?>
                    <tr>
                        <td><?php echo $item->GetDescription(); ?></td>
                    </tr>
                <?php endforeach; ?>
            </table>
        <?php else: ?>
            No Items found.<br>
        <?php endif ?>   
    <!-- Footer -->
<?php include $_SERVER['DOCUMENT_ROOT'] . '/includes/_footer.php';  ?>    
</body>
</html>
