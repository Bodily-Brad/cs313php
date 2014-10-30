<!doctype html>
<html lang="en">
<!-- HEAD -->
<?php include $_SERVER['DOCUMENT_ROOT'] . '/includes/_head.php';  ?>
<body>
    <!-- HEADER -->
<?php include $_SERVER['DOCUMENT_ROOT'] . '/includes/_header.php';  ?>
    <div class='gameFrame'>
        <div class='gameNote'>Thank you for playing.</div>
        <div class='gameUserInputArea'>
            <div class='gameInstructions'>
                <p><?php if (isset($message)) echo $message;?></p>             
                <p>
                    Every time you play, it helps me learn a little more and get
                    a little better at guessing your secret object. If you'd like
                    to go again, click 'Play Again' below.
                </p>
            </div>           
        </div>
        <div class='gameNote'><a href="?action=End">Play Again</a></div>
    </div>            
    <!-- Footer -->
<?php include $_SERVER['DOCUMENT_ROOT'] . '/includes/_footer.php';  ?>    
</body>
</html>
