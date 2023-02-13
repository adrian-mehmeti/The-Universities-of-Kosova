<?php
// create a new function
function search($text){
	
	// connection to the Ddatabase
	$db = new PDO("mysql:host=localhost;dbname=uekdatabase", 'root', '');
	// let's filter the data that comes in
	$text = htmlspecialchars($text);
	// prepare the mysql query to select the users 
	$get_name = $db->prepare("SELECT emri FROM fakultet WHERE emri LIKE concat('%', :name, '%')");
	// execute the query
	$get_name -> execute(array('name' => $text));
	// show the users on the page
	while($names = $get_name->fetch(PDO::FETCH_ASSOC)){
		// show each user as a link
		echo '<a href="<?php ?>">'.$names['emri'].'</a>';
		
	}
}
// call the search function with the data sent from Ajax
search($_GET['txt']);
?>