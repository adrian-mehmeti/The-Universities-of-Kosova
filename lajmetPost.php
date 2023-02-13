
<?php 
	
	session_start();

	include 'connect.php';
	if(isset($_GET)){
	$id = $_GET['id'];
	}
	
	
	$sql = "SELECT * FROM lajmet";
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

	<div class="blogg">
		<div class="container">
			<div class="row">
					<?php while($rows = $stmt->fetch()): ?>
					<div class="col-md-8">
						<?php if($id == $rows['lajmet_id']): ?>
						<div class="blog">
							<img src="postimet/<?php echo $rows['foto'];?>" alt="image">
						</div>
						<div class="blog-c">
							<?php 
								$dtime = $rows['dataKrijimit'];
								$day =  date ("d" , strtotime($dtime));
								$month = date ("M", strtotime($dtime));
							?>
							<div class="calendar">
								<?php print $day?>
								<span><?php print $month?></span>
							</div>
							
							
							<div class="b-txt">
								<h3><?php echo  $rows['titulli']; ?></h3>
								<p><?php echo  $rows['permbajtja']; ?></p>
							</div>
						</div>
						<?php endif;?>
					</div>
					<?php endwhile;?>
			</div>
			
		</div>
		<!--- Container -->
	</div>
	<!--- Blogg -->

	<?php
		include 'footerSticky.php';
	?>

	<script type="text/javascript" src="https://code.jquery.com/jquery-2.1.4.js"></script>
 	<script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
</body>
</html>