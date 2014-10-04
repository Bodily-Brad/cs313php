<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <link rel="stylesheet" type="text/css" href="/style/bcb.css" media="screen">
  <title>BCBodily - CS 313 - Assignment 2.03 - Poll</title>
</head>
<?php
// Init variables if not already set
    if (!isset($aim)) $aim = "";
    if (!isset($funny)) $funny = "";
    if (!isset($smart)) $smart = "";
    if (!isset($tough)) $tough = "";
?>
<body>
<!-- Header -->
<?php include $_SERVER['DOCUMENT_ROOT'] . '/includes/_header.php';  ?> 
    <h1>PHP Survey</h1>
    <form class="poll" action="." method="post">
        <h2>Poll
            <span>Pick Your Favorites</span>
        </h2>
        <h3>Top Shot?</h3>
        <?php if (isset($aimMessage)) echo "<span class='error'>$aimMessage</span><br>"; ?>
        <input type="radio" name="aim" value="Clint" <?php if ($aim=="Clint") echo "checked"?> >Barton<br>
        <input type="radio" name="aim" value="Legolas" <?php if ($aim=="Legolas") echo "checked"?> >Greenleaf<br>
        <input type="radio" name="aim" value="Robin" <?php if ($aim=="Robin") echo "checked"?> >Locksley<br>
        <input type="radio" name="aim" value="Ralph" <?php if ($aim=="Ralph") echo "checked"?> >Parker<br>        
        <h3>Top Lines?</h3>
        <?php if (isset($funnyMessage)) echo "<span class='error'>$funnyMessage</span><br>"; ?>
        <input type="radio" name="funny" value="Troy" <?php if ($funny=="Troy") echo "checked"?> >Barnes<br>
        <input type="radio" name="funny" value="Michael" <?php if ($funny=="Michael") echo "checked"?> >Bluth<br>        
        <input type="radio" name="funny" value="Philip" <?php if ($funny=="Philip") echo "checked"?> >Fry<br>
        <input type="radio" name="funny" value="Jim" <?php if ($funny=="Jim") echo "checked"?> >Halpert<br>
        <h3>Top of the Class?</h3>
        <?php if (isset($smartMessage)) echo "<span class='error'>$smartMessage</span><br>"; ?>        
        <input type="radio" name="smart" value="Reginald" <?php if ($smart=="Reginald") echo "checked"?> >Barclay<br>
        <input type="radio" name="smart" value="Sherlock" <?php if ($smart=="Sherlock") echo "checked"?> >Holmes<br>
        <input type="radio" name="smart" value="Red" <?php if ($smart=="Red") echo "checked"?> >Reddington<br>
        <input type="radio" name="smart" value="Michael" <?php if ($smart=="Michael") echo "checked"?> >Scofield<br>
        <h3>Top... single name tough guy?</h3>
        <?php if (isset($toughMessage)) echo "<span class='error'>$toughMessage</span><br>"; ?>        
        <input type="radio" name="tough" value="Fezzik" <?php if ($tough=="Fezzik") echo "checked"?> >Fezzik<br>
        <input type="radio" name="tough" value="He-Man" <?php if ($tough=="He-Man") echo "checked"?> >He-man<br>
        <input type="radio" name="tough" value="Teal'c" <?php if ($tough=="Teal'c") echo "checked"?> >Teal'c<br>
        <input type="radio" name="tough" value="Worf" <?php if ($tough=="Worf") echo "checked"?> >Worf<br>
        <input type="hidden" name="action" value="submitVote"><br>
        <input type="submit" value="Submit" class="button"><input type="reset" value="Reset" class="button"><br>
    </form>
<div class='centered'><a href=".?action=view">View Results without Voting</a></div>
    <!-- Footer -->
<?php include $_SERVER['DOCUMENT_ROOT'] . '/includes/_footer.php';  ?>
</body>
</html>    