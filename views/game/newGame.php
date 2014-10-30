<!doctype html>
<html lang="en">
<!-- HEAD -->
<?php include $_SERVER['DOCUMENT_ROOT'] . '/includes/_head.php';  ?>
<body>
    <!-- HEADER -->
<?php include $_SERVER['DOCUMENT_ROOT'] . '/includes/_header.php';  ?>
    <div class='gameFrame'>
        <div class='gameNote'>How to Play</div>
        <div class='gameUserInputArea'>
            <div class='gameInstructions'>
                <p>
                    You pick a secret object, then I'll ask a series of "yes/no" type questions.
                    Based on your answers, I'll guess which item you're thinking of.
                    Try to pick that answer that you think is most accurate, but
                    don't put too much thought into it - if nothing seems appropriate,
                    feel free to say "I Don't Know".
                </p>             
                <p>
                    I'm still very new at this and so I have a lot of learning to do.
                    For now, please pick something from the list below as your secret object.
                </p>
            </div>
            <div class='gameItemList'>
                <ul>
                    <?php
                        foreach($items as $item)
                        {
                            echo "<li>" . $item->GetDescription() . "</li>";
                        }
                    ?>                    
                </ul>
            </div>
            <div class='gameInstructions'>
                <p>
                    Once you've picked your secret item, click the link below to get
                    started.
                </p>         
            </div>            
        </div>
        <div class='gameNote'><a href="?action=Start">Okay, got it. Let's go!</a></div>
    </div>        
    <!-- Footer -->
<?php include $_SERVER['DOCUMENT_ROOT'] . '/includes/_footer.php';  ?>    
</body>
</html>
