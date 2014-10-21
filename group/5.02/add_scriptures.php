<?php
// Start the session
session_start();

echo '<h1>New Scripture Entry</h1>';

	//Connect to the database
	include 'dbConnection.php';
	$db = loadDB();
	
	//Get topics
	$topics = $db->query("SELECT * FROM topics");

	//Make form
	echo '<form action="" method="POST" >
		Book: <input name="book"><br><br>
		Chapter: <input name="chapter"><br><br>
		Verse: <input name="verse"><br><br>
		Content: <textarea name="content" rows="5" cols="40"></textarea><br><br>';
	echo 'Topic(s):<br>';
	
	//Make checkboxes
	while($row = $topics->fetch(PDO::FETCH_ASSOC)) 
		{
			echo '<input type="checkbox" name="topics[]" value=' . $row['name'] . '>' . $row['name'] . '<br>';
		}
	
	//Make other checkbox
	echo '<input type="checkbox" name="topics[]" value="other">Other <input name="other"><br><br>';
			
	echo '<br><input type="submit" value="Submit">
	</form>'; 
	
	echo '<h1>Entered Scriptures</h1>';
	
	//Get and display current scriptures
	$scriptures = $db->query("SELECT * FROM scriptures");
	
		while($row = $scriptures->fetch(PDO::FETCH_ASSOC)) 
		{
			echo '<strong>' . $row['book'].' '.$row['chapter'] . ':' . $row['verse'] . '</strong>' .' - "'. $row['content'] . '"' . "<br>";
		}
?>

