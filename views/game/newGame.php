<!doctype html>
<html lang="en">
<!-- HEAD -->
<?php include $_SERVER['DOCUMENT_ROOT'] . '/includes/_head.php';  ?>
<body>
    <!-- HEADER -->
<?php include $_SERVER['DOCUMENT_ROOT'] . '/includes/_header.php';  ?>
        <h1>How To Play</h1>
        <p>I'm still very new at this and I'm still doing a lot of learning. For
        now, please pick something from the list below as your secret object.</p>
        <p>
            I'll ask a series of "yes/no" type questions. Try to answer as best
            you can. Based on your answers, I'll try to guess which item you're
            thinking of. Again, I'm still learning, so take it easy on me, please.
        </p>
        <?php
            foreach($items as $item)
            {
                echo $item->GetDescription() . "<br>";
            }
        ?>
        <br>
        <p>
            Once you've picked your secret item, click the link below to get
            started.
        </p>
        <a href="?action=Start">Okay, got it. Let's go!</a>
    <!-- Footer -->
<?php include $_SERVER['DOCUMENT_ROOT'] . '/includes/_footer.php';  ?>    
</body>
</html>
