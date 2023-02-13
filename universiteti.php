<?php 
	session_start();

	include 'connect.php';

	$sql = "SELECT fakultet_id, emri FROM fakultet";
				 
	$stmt = $DB_con->query($sql);
	$stmt->setFetchMode(PDO::FETCH_ASSOC);
	


	
?>
<!DOCTYPE html>
<html>
<head>
	<title>Universitetet E Kosoves</title>
  	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
  
  	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
  	<link href="http://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">

  	<link rel="stylesheet" type="text/css" href="css/styleothers.css">
</head>
<body>
	<?php
		include 'header.php';
	?>
	<!--- Uni body --->
	<div class="container">
		<div class="row univers-p">
			<?php while($rows = $stmt->fetch()): 
				$names =  $rows['fakultet_id'];
				echo $names;
			?>
			<div class="col-lg-3 col-sm-4">
				<div class="thumbnail">
					<a href="universitetiPost.php?name=kolegji ubt.jpg">
						<img src="images/kolegji ubt.jpg" alt="foto1">
						<!--*********************************************************** -->
					</a>
				</div>
			</div>
		<?php endwhile;?>
		</div>
		<!--- Row --->
	</div>
	<!--- Container --->

	<?php
		include 'footerFixed.php';
	?>

	<script type="text/javascript" src="https://code.jquery.com/jquery-2.1.4.js"></script>
 	<script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
</body>
</html>