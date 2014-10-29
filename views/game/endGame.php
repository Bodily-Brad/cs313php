<!doctype html>
<html lang="en">
<!-- HEAD -->
<?php include $_SERVER['DOCUMENT_ROOT'] . '/includes/_head.php';  ?>
<body>
    <!-- HEADER -->
<?php include $_SERVER['DOCUMENT_ROOT'] . '/includes/_header.php';  ?>
        <h1><?php if (isset($message)) echo $message;?></h1>
        <p>
            Normally at this point, I'd try to tell you what item you were
            thinking of. But, as it stands, I simply don't know yet. Hang in
            there with me, but for now you might want to...
        </p>
        <a href="?action=End">Start Over</a>
        <h2>Other Stuff</h2>
        <p>
            Oh, you're still here, don't worry about this stuff, it's for me.
        </p>
        <h3>Answers</h3>
        <pre>
        <?php
            print_r(Game::GetQuestionsAnswered());
        ?>
        </pre>
        <h3>Confidences</h3>
        <pre>
        <?php
            print_r($temp);
        ?>
        </pre>        
    <!-- Footer -->
<?php include $_SERVER['DOCUMENT_ROOT'] . '/includes/_footer.php';  ?>    
</body>
</html>
