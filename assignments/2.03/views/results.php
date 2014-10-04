<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <link rel="stylesheet" type="text/css" href="/style/bcb.css" media="screen">
  <title>BCBodily - CS 313 - Assignment 2.03 - Results</title>
</head>
<body>
<!-- Header -->
<?php include $_SERVER['DOCUMENT_ROOT'] . '/includes/_header.php';  ?>
    <h1>PHP Survey Results</h1>
    <div class="poll">
        <h2>Poll
            <span>Results</span>
        </h2>
        <?php if (isset($resultsMessage)) echo $resultsMessage; ?>
        <h3>Top Shots</h3>
        <label>
            <span>Clint Barton:</span>
             <?=$aimResults["Clint"]?>
        </label>
        <label>
            <span>Legoals Greenleaf:</span>
            <?=$aimResults["Legolas"]?>
        </label>
        <label>
            <span>Robin Locksley:</span>
            <?=$aimResults["Robin"]?>
        </label>
        <label>
            <span>Ralph Parker:</span>
            <?=$aimResults["Ralph"]?>
        </label>
        <h3>Top Lines</h3>
        <label>
            <span>Troy Barnes:</span>
            <?=$funnyResults["Troy"]?>
        </label>
        <label>
            <span>Michael Bluth:</span>
            <?=$funnyResults["Michael"]?>
        </label>
        <label>
            <span>Philip J. Fry:</span>
            <?=$funnyResults["Philip"]?>
        </label>
        <label>
            <span>Jim Halpert:</span>
            <?=$funnyResults["Jim"]?>
        </label>
        <h3>Tops of the Class</h3>
        <label>
            <span>Reginald Barclay:</span>
            <?=$smartResults["Reginald"]?>
        </label>
        <label>
            <span>Sherlock Holmes:</span>
            <?=$smartResults["Sherlock"]?>
        </label>
        <label>        
            <span>Red Reddington:</span>
            <?=$smartResults["Red"]?>
        </label>
        <label>
            <span>Michael Scofield:</span>
            <?=$smartResults["Michael"]?>
        </label>
        <h3>Top Single Name Tough Guys</h3>
        <label>
            <span>Fezzik:</span>
            <?=$toughResults["Fezzik"]?>
        </label>
        <label>
            <span>He-Man:</span>
            <?=$toughResults["He-Man"]?>
        </label>
        <label>
            <span>Teal'c:</span>
            <?=$toughResults["Teal'c"]?>
        </label>
        <label>
            <span>Worf:</span>
            <?=$toughResults["Worf"]?>
        </label>
    </div>
    <!-- Footer -->
<?php include $_SERVER['DOCUMENT_ROOT'] . '/includes/_footer.php';  ?>
</body>
</html>    