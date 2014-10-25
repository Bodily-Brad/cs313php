<!doctype html>
<html lang="en">
<!-- HEAD -->
<?php include $_SERVER['DOCUMENT_ROOT'] . '/includes/_head.php';  ?>
<body>
    <!-- HEADER -->
<?php include $_SERVER['DOCUMENT_ROOT'] . '/includes/_header.php';  ?>
    <h1>Question Management</h1>
    <?php if (isset($message)) echo $message . '<br>'; ?>
    <h2>Add Questions</h2>
    <form action="/game/manage/" method="POST">
        <label>Description</label><input type='text' name='questionText' required>
        <input type="hidden" name="action" value="addNewQuestion">
        <input type='submit' value='Add Item'>
    </form>
    <h2>List Questions</h2>
    <?php
        if (!empty($questions)):?>
            <table>
                <tr><th>Question</th><tr>
                <?php foreach ($questions as $question):?>
                    <tr>
                        <td><?php echo $question->GetText(); ?></td>
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
