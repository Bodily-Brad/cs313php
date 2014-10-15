<?php
// Start the session
session_start();
?>
<h1>Scripture Search</h1>
<form action="results.php" method="POST" >
    Book: <select name="book">
		<option value="any">Any</option>
		<option value="John">John</option>
		<option value="Doctorine and Covenants">Doctorine and Covenants</option>
		<option value="Mosiah">Mosiah</option>
		</select>
		<br/><br/>

    <input type="submit" value="Submit">
</form>
