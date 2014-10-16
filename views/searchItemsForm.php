<!doctype html>
<html lang="en">
<!-- HEAD -->
<?php include $_SERVER['DOCUMENT_ROOT'] . '/includes/_head.php';  ?>
<body>
    <!-- HEADER -->
<?php include $_SERVER['DOCUMENT_ROOT'] . '/includes/_header.php';  ?>
    <h1>Search Items</h1>
    <form action='../game/'>
        <label>Type full or partial description, or leave blank to show all: </label><br>
        <input type='text' name='description'>
        <input type='hidden' name='action' value='SearchItems'>
        <input type='submit' value='Search'>
    </form>
    <!-- Footer -->
<?php include $_SERVER['DOCUMENT_ROOT'] . '/includes/_footer.php';  ?>    
</body>
</html>
