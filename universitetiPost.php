<?php 
	
	$name= $_GET['name'];

	session_start();

	include 'connect.php';
	
	$sql = "SELECT emri from fakultet";
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
	<div class="container">
		<?php 
		while($rows = $stmt->fetch()):
		if( $rows['emri'] == $name):
		?>
		<div class="row univers-p">
			
			<div class="col-md-6">
					<div class="uni-c">
						<img src="images/<?php echo $rows['emri'] ?>.jpg" alt="image">
						<div class="uni-txt">
							<h1>
								<?php echo $rows['emri'];  ?>
							</h1>
							<h3>Programi I Universitetit </h3>
							
						</div>	
				</div>
			</div>
			

						<!--- col-md-6 --->
			<div class="col-lg-8">
				<table class="table table-bordered">
					
					<thead>
						<tr>
							<th scope="col">Drejtimi</th>
							<th scope="col">Semestri</th>
							<th scope="col">Pagesa</th>
							<th scope="col">Adresa</th>
						</tr>
					</thead>
					<tbody>
						<?php 
							$sql = "SELECT drejtimet.emri_drejtimit, GROUP_CONCAT(adress.vendi) as adressat,fkmain.semestri,fkmain.pagesa 
									FROM (((fkmain 
									INNER JOIN adress on fkmain.adress_id = adress.adress_id) 
									INNER JOIN drejtimet on drejtimet.drejtimet_id = fkmain.drejtimet_id) 
									INNER JOIN fakultet on fakultet.fakultet_id = fkmain.fakultet_id) 
									WHERE fakultet.emri LIKE '%$name' 
									GROUP BY emri_drejtimit";		 
							$stmt = $DB_con->query($sql);
							$stmt->setFetchMode(PDO::FETCH_ASSOC);
							while ($rows = $stmt->fetch()):
						?>
				
						<tr>
							    <td><?php echo $rows['emri_drejtimit']?></td>
							    <td><?php echo $rows['semestri']?></td>
							    <td><?php echo $rows['pagesa']?></td>
							   	<td><?php echo $rows ['adressat'];?></td>
								
						</tr>
					
						<?php  
							endwhile;	
						?>
					</tbody>
					
				</table>
				
			</div>
			
				

			<!--- col-lg-8 --->
		</div>
		<?php 
	  			endif;
	  			endwhile;
			?>
		
			
		<!--- row --->
	</div>
	<!--- Container --->
	<?php
		include 'footerFixed.php';
	?>

	<script type="text/javascript" src="https://code.jquery.com/jquery-2.1.4.js"></script>
 	<script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
</body>
</html>